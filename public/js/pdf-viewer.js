// PDF Viewer JavaScript Functions

// Set PDF.js worker path
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

let speechSynthesis = window.speechSynthesis;
let currentUtterance = null;
let isReading = false;
let currentText = '';
let currentIndex = 0;
let textChunks = [];
let pdfDocument = null;
let currentPage = 1;
let totalPages = 0;
let bookId = 'unknown';
let bookTitle = 'Book';
let bookAuthor = 'Author';

// Initialize audio functionality
document.addEventListener('DOMContentLoaded', function() {
    // Test PDF.js availability first
    if (typeof pdfjsLib === 'undefined') {
        console.warn('PDF.js library not loaded. Text extraction will be limited.');
        document.getElementById('audioStatus').innerHTML = `
            <span class="text-warning">
                <i class="fas fa-exclamation-triangle me-2"></i>
                PDF.js library not available. Using basic text extraction methods.
            </span>
        `;
    } else {
        console.log('PDF.js library loaded successfully');
    }
    
    const startBtn = document.getElementById('startAudioBtn');
    const resumeBtn = document.getElementById('resumeAudioBtn');
    const pauseBtn = document.getElementById('pauseAudioBtn');
    const stopBtn = document.getElementById('stopAudioBtn');
    const readCurrentPageBtn = document.getElementById('readCurrentPageBtn');
    const prevPageBtn = document.getElementById('prevPageBtn');
    const nextPageBtn = document.getElementById('nextPageBtn');
    const readPageBtn = document.getElementById('readPageBtn');
    const pageInput = document.getElementById('pageInput');
    const goToPageBtn = document.getElementById('goToPageBtn');
    const refreshPageBtn = document.getElementById('refreshPageBtn');
    const extractTextBtn = document.getElementById('extractTextBtn');
    const forceReadBtn = document.getElementById('forceReadBtn');
    const statusDiv = document.getElementById('audioStatus');
    const progressBar = document.getElementById('audioProgressBar');
    const speedControl = document.getElementById('speedControl');
    const volumeControl = document.getElementById('volumeControl');
    const currentPageDisplay = document.getElementById('currentPageDisplay');
    
    // Add event listeners
    if (startBtn) startBtn.addEventListener('click', startReading);
    if (resumeBtn) resumeBtn.addEventListener('click', resumeReading);
    if (pauseBtn) pauseBtn.addEventListener('click', pauseReading);
    if (stopBtn) stopBtn.addEventListener('click', stopReading);
    if (readCurrentPageBtn) readCurrentPageBtn.addEventListener('click', forceReadCurrentPage);
    if (prevPageBtn) prevPageBtn.addEventListener('click', goToPreviousPage);
    if (nextPageBtn) nextPageBtn.addEventListener('click', goToNextPage);
    if (readPageBtn) readPageBtn.addEventListener('click', readCurrentPage);
    if (goToPageBtn) goToPageBtn.addEventListener('click', goToSpecificPage);
    if (refreshPageBtn) refreshPageBtn.addEventListener('click', refreshCurrentPageText);
    if (extractTextBtn) extractTextBtn.addEventListener('click', extractTextFromCurrentVisiblePage);
    if (forceReadBtn) forceReadBtn.addEventListener('click', forceReadCurrentPage);
    
    // Audio controls
    if (speedControl) speedControl.addEventListener('input', updateSpeed);
    if (volumeControl) volumeControl.addEventListener('input', updateVolume);
    
    // Set up page change detection
    setupPageChangeDetection();
    
    // Set up manual text input as fallback
    setupManualTextInput();
    
    // Load saved reading progress
    loadReadingProgress();
    
    // Initialize PDF text extraction with a delay to ensure everything is loaded
    setTimeout(() => {
        initializePDFTextExtraction();
        // Try PDF.js text extraction first if available
        if (typeof pdfjsLib !== 'undefined') {
            extractTextUsingPDFJS().then(success => {
                if (success) {
                    console.log('PDF.js text extraction successful');
                } else {
                    console.log('PDF.js text extraction failed, using fallback');
                    forceExtractCurrentPageText();
                }
            });
        } else {
            // Use fallback method immediately
            forceExtractCurrentPageText();
        }
    }, 1000);
    
    // Add additional initialization after a longer delay
    setTimeout(() => {
        // Check if text extraction was successful
        if (!window.pageTexts || Object.keys(window.pageTexts).length === 0) {
            console.log('Initial text extraction may have failed, trying again...');
            forceExtractCurrentPageText();
        }
    }, 5000);
});

// Function to detect page changes in the PDF viewer
function setupPageChangeDetection() {
    // Try to detect page changes from the iframe
    const iframe = document.getElementById('pdfViewer');
    if (iframe) {
        // Listen for messages from the PDF viewer
        window.addEventListener('message', function(event) {
            if (event.data && event.data.type === 'pagechange') {
                window.currentPageNumber = event.data.page;
                updatePageDisplay();
            }
        });
        
        // Also try to detect page changes by monitoring the iframe
        setInterval(() => {
            try {
                if (iframe.contentWindow && iframe.contentWindow.PDFViewerApplication) {
                    const currentPage = iframe.contentWindow.PDFViewerApplication.page;
                    if (currentPage && currentPage !== window.currentPageNumber) {
                        window.currentPageNumber = currentPage;
                        updatePageDisplay();
                    }
                }
            } catch (error) {
                // Ignore errors from iframe access
            }
        }, 1000);
    }
}

// Function to show visual click indicator
function showClickIndicator(x, y, iframe) {
    // Remove any existing indicators
    const existingIndicators = document.querySelectorAll('.click-indicator');
    existingIndicators.forEach(el => el.remove());
    
    // Create new click indicator
    const indicator = document.createElement('div');
    indicator.className = 'click-indicator';
    indicator.style.cssText = `
        position: absolute;
        left: ${iframe.offsetLeft + x}px;
        top: ${iframe.offsetTop + y}px;
        width: 20px;
        height: 20px;
        background: radial-gradient(circle, #ff4444 0%, transparent 70%);
        border: 2px solid #ff0000;
        border-radius: 50%;
        pointer-events: none;
        z-index: 10000;
        animation: clickPulse 1s ease-out;
    `;
    
    document.body.appendChild(indicator);
    
    // Remove indicator after animation
    setTimeout(() => {
        indicator.remove();
    }, 1000);
}

// NEW SIMPLIFIED FUNCTION: Start reading from clicked position
function startReadingFromClickPosition(x, y, pageNumber) {
    console.log('Starting reading from click position:', { x, y, pageNumber });
    
    try {
        // First, make sure we have text for the current page
        if (!window.pageTexts || !window.pageTexts[pageNumber]) {
            console.log('No text found for page', pageNumber, '- extracting now...');
            const pageText = extractTextFromIframe();
            if (pageText && pageText.trim().length > 0) {
                if (!window.pageTexts) window.pageTexts = {};
                window.pageTexts[pageNumber] = pageText;
                console.log('Text extracted for page', pageNumber);
            } else {
                console.log('Failed to extract text for page', pageNumber);
                document.getElementById('audioStatus').innerHTML = `<span class="text-warning">Click "Read Current Page" first to extract content</span>`;
                return;
            }
        }
        
        const pageText = window.pageTexts[pageNumber];
        if (!pageText || pageText.trim().length === 0) {
            console.log('No text available for reading');
            document.getElementById('audioStatus').innerHTML = `<span class="text-warning">No text available for reading</span>`;
            return;
        }
        
        // Split text into sentences for easier navigation
        const sentences = pageText.split(/[.!?]+/).filter(s => s.trim().length > 0);
        console.log('Page text split into', sentences.length, 'sentences');
        
        // Find the sentence that contains the clicked position
        // For now, just start from the beginning of the page
        // You can enhance this to find the exact sentence based on coordinates
        const textToRead = pageText;
        
        // Start reading from the beginning of the page
        startReadingFromLine(textToRead, 1, pageNumber);
        
        // Show success message
        document.getElementById('audioStatus').innerHTML = `<span class="text-success">Reading from page ${pageNumber}</span>`;
        
    } catch (error) {
        console.error('Error starting reading from click position:', error);
        document.getElementById('audioStatus').innerHTML = `<span class="text-danger">Error: ${error.message}</span>`;
    }
}

// Function to start reading
function startReading() {
    // Check if we have text to read
    if (!window.pageTexts || Object.keys(window.pageTexts).length === 0) {
        // Try to extract text first
        forceExtractCurrentPageText();
        
        // If still no text, show manual input message
        setTimeout(() => {
            if (!window.pageTexts || Object.keys(window.pageTexts).length === 0) {
                document.getElementById('audioStatus').innerHTML = `
                    <span class="text-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        No text available to read. Please use the manual text input below.
                    </span>
                `;
                return;
            }
        }, 2000);
        return;
    }
    
    // Get text from current page
    const currentPage = window.currentPageNumber || 1;
    const pageText = window.pageTexts[currentPage];
    
    if (!pageText || pageText.trim().length === 0) {
        document.getElementById('audioStatus').innerHTML = `
            <span class="text-warning">
                <i class="fas fa-exclamation-triangle me-2"></i>
                No text found on page ${currentPage}. Please use manual text input.
            </span>
        `;
        return;
    }
    
    // Split text into chunks and start reading
    textChunks = splitTextIntoChunks(pageText, 200);
    currentIndex = 0;
    isReading = true;
    
    document.getElementById('startAudioBtn').style.display = 'none';
    document.getElementById('resumeAudioBtn').style.display = 'none';
    document.getElementById('pauseAudioBtn').style.display = 'none';
    document.getElementById('stopAudioBtn').style.display = 'block';
    document.getElementById('audioInfo').style.display = 'block';
    
    updateReadingInfo();
    readNextChunk();
}

function resumeReading() {
    if (textChunks.length === 0) {
        document.getElementById('audioStatus').innerHTML = '<span class="text-danger">No text available to read</span>';
        return;
    }
    
    isReading = true;
    
    document.getElementById('startAudioBtn').style.display = 'none';
    document.getElementById('resumeAudioBtn').style.display = 'none';
    document.getElementById('pauseAudioBtn').style.display = 'none';
    document.getElementById('stopAudioBtn').style.display = 'block';
    document.getElementById('audioInfo').style.display = 'block';
    
    // Update progress bar to show current position
    const progress = (currentIndex / textChunks.length) * 100;
    document.getElementById('audioProgressBar').style.width = progress + '%';
    
    updateReadingInfo();
    readNextChunk();
}

// Function to initialize PDF text extraction
async function initializePDFTextExtraction() {
    const statusDiv = document.getElementById('audioStatus');
    
    try {
        // Initialize PDF.js
        if (typeof pdfjsLib !== 'undefined') {
            statusDiv.innerHTML = `
                <span class="text-success">
                    <i class="fas fa-check me-2"></i>
                    PDF text extraction initialized with PDF.js.
                </span>
            `;
            console.log('PDF text extraction system ready with PDF.js');
        } else {
            statusDiv.innerHTML = `
                <span class="text-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    PDF.js library not available. Using basic text extraction methods.
                </span>
            `;
            console.log('PDF.js not available, using basic methods');
        }
    } catch (error) {
        console.error('Error initializing PDF text extraction:', error);
        statusDiv.innerHTML = `
            <span class="text-warning">
                <i class="fas fa-exclamation-triangle me-2"></i>
                PDF text extraction failed. Using fallback methods.
            </span>
        `;
    }
}

// Enhanced text extraction using PDF.js
async function extractTextUsingPDFJS() {
    try {
        if (typeof pdfjsLib === 'undefined') {
            console.log('PDF.js not available');
            return false;
        }

        const pdfUrl = document.getElementById('pdfViewer')?.src || window.location.href;
        if (!pdfUrl) {
            console.log('No PDF URL found');
            return false;
        }

        const loadingTask = pdfjsLib.getDocument(pdfUrl);
        const pdf = await loadingTask.promise;
        
        if (!window.pageTexts) window.pageTexts = {};
        
        // Extract text from first few pages to test
        const pagesToExtract = Math.min(3, pdf.numPages);
        for (let pageNum = 1; pageNum <= pagesToExtract; pageNum++) {
            try {
                const page = await pdf.getPage(pageNum);
                const textContent = await page.getTextContent();
                const pageText = textContent.items.map(item => item.str).join(' ');
                window.pageTexts[pageNum] = pageText;
                console.log(`Text extracted for page ${pageNum}:`, pageText.substring(0, 100) + '...');
            } catch (pageError) {
                console.log(`Error extracting text from page ${pageNum}:`, pageError.message);
                window.pageTexts[pageNum] = '';
            }
        }
        
        window.totalPages = pdf.numPages;
        console.log(`Successfully extracted text from ${pagesToExtract} pages using PDF.js`);
        return true;
    } catch (error) {
        console.error('Error using PDF.js for text extraction:', error);
        return false;
    }
}

// Extract text from all pages using PDF.js
async function extractTextFromAllPages() {
    try {
        if (typeof pdfjsLib === 'undefined') {
            console.log('PDF.js not available for text extraction');
            return false;
        }

        const pdfUrl = document.getElementById('pdfViewer')?.src || window.location.href;
        if (!pdfUrl) {
            console.log('No PDF URL found');
            return false;
        }

        const loadingTask = pdfjsLib.getDocument(pdfUrl);
        const pdf = await loadingTask.promise;
        
        if (!window.pageTexts) window.pageTexts = {};
        
        for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
            try {
                const page = await pdf.getPage(pageNum);
                const textContent = await page.getTextContent();
                const pageText = textContent.items.map(item => item.str).join(' ');
                window.pageTexts[pageNum] = pageText;
                console.log(`Text extracted for page ${pageNum}:`, pageText.substring(0, 100) + '...');
            } catch (pageError) {
                console.log(`Error extracting text from page ${pageNum}:`, pageError.message);
                window.pageTexts[pageNum] = '';
            }
        }
        
        window.totalPages = pdf.numPages;
        console.log(`Successfully extracted text from ${pdf.numPages} pages`);
        return true;
    } catch (error) {
        console.error('Error extracting text from all pages:', error);
        return false;
    }
}

// Extract text from current visible page using PDF.js
async function extractTextFromCurrentVisiblePage() {
    const currentPage = window.currentPageNumber || 1;
    
    try {
        if (typeof pdfjsLib !== 'undefined') {
            const pdfUrl = document.getElementById('pdfViewer')?.src || window.location.href;
            if (pdfUrl) {
                const loadingTask = pdfjsLib.getDocument(pdfUrl);
                const pdf = await loadingTask.promise;
                
                if (currentPage <= pdf.numPages) {
                    const page = await pdf.getPage(currentPage);
                    const textContent = await page.getTextContent();
                    const pageText = textContent.items.map(item => item.str).join(' ');
                    
                    if (!window.pageTexts) window.pageTexts = {};
                    window.pageTexts[currentPage] = pageText;
                    
                    console.log(`Text extracted for page ${currentPage}:`, pageText.substring(0, 100) + '...');
                    document.getElementById('audioStatus').innerHTML = `
                        <span class="text-success">
                            <i class="fas fa-check me-2"></i>
                            Text extracted for page ${currentPage}
                        </span>
                    `;
                    return true;
                }
            }
        }
        
        // Fallback to iframe method
        return forceExtractCurrentPageText();
    } catch (error) {
        console.error('Error extracting text from current page:', error);
        // Fallback to iframe method
        return forceExtractCurrentPageText();
    }
}

// Create intelligent fallback text
function createIntelligentFallbackText() {
    const fallbackTexts = [
        "This is a sample text for demonstration purposes. You can manually input the text you want to read from the manual text input box below.",
        "If automatic text extraction is not working, please use the manual text input feature located at the bottom of the right sidebar.",
        "The PDF viewer is ready. You can navigate through pages and use the manual text input to begin your reading experience.",
        "Welcome to the PDF reader. Use the page navigation controls above and the manual text input below to begin your reading experience."
    ];
    
    return fallbackTexts[Math.floor(Math.random() * fallbackTexts.length)];
}

// Fallback text extraction from iframe
function extractTextFromIframe() {
    try {
        const iframe = document.getElementById('pdfViewer');
        if (iframe && iframe.contentWindow && iframe.contentWindow.document) {
            const iframeDoc = iframe.contentWindow.document;
            const textContent = iframeDoc.body ? iframeDoc.body.textContent : '';
            return textContent || '';
        }
    } catch (error) {
        console.log('Error extracting text from iframe:', error.message);
    }
    return '';
}

// Force extract current page text (fallback method)
function forceExtractCurrentPageText() {
    const currentPage = window.currentPageNumber || 1;
    
    // First try to get the PDF viewer iframe
    const iframe = document.getElementById('pdfViewer');
    if (!iframe) {
        console.log('PDF viewer iframe not found');
        document.getElementById('audioStatus').innerHTML = `<span class="text-warning">PDF viewer not found. Use manual text input below.</span>`;
        return false;
    }
    
    // Try to extract text from iframe
    const extractedText = extractTextFromIframe();
    
    if (extractedText && extractedText.trim().length > 0) {
        if (!window.pageTexts) window.pageTexts = {};
        window.pageTexts[currentPage] = extractedText;
        console.log('Text extracted for page', currentPage, 'Length:', extractedText.length);
        document.getElementById('audioStatus').innerHTML = `<span class="text-success">Text extracted for page ${currentPage} (${extractedText.length} characters)</span>`;
        return true;
    } else {
        console.log('Failed to extract text for page', currentPage);
        console.log('Iframe src:', iframe.src);
        console.log('Iframe content accessible:', iframe.contentWindow ? 'Yes' : 'No');
        
        // Show helpful message with manual input suggestion
        document.getElementById('audioStatus').innerHTML = `
            <span class="text-warning">
                <i class="fas fa-exclamation-triangle me-2"></i>
                Failed to extract text for page ${currentPage}. 
                <br><small>Use the manual text input box below to type or paste the text you want to read.</small>
            </span>
        `;
        return false;
    }
}

// Function to read manually entered text
function readManualText() {
    const textInput = document.getElementById('manualTextInput');
    if (textInput && textInput.value.trim()) {
        const manualText = textInput.value.trim();
        console.log('Reading manual text:', manualText.substring(0, 100));
        
        // Split text into chunks and start reading
        textChunks = splitTextIntoChunks(manualText, 200);
        currentIndex = 0;
        isReading = true;
        
        // Show controls
        document.getElementById('startAudioBtn').style.display = 'none';
        document.getElementById('resumeAudioBtn').style.display = 'none';
        document.getElementById('pauseAudioBtn').style.display = 'none';
        document.getElementById('stopAudioBtn').style.display = 'block';
        document.getElementById('audioInfo').style.display = 'block';
        
        // Show success message
        document.getElementById('audioStatus').innerHTML = `
            <span class="text-success">
                <i class="fas fa-play me-2"></i>
                Reading manual text (${manualText.length} characters)
            </span>
        `;
        
        // Start reading
        updateReadingInfo();
        readNextChunk();
        
        // Clear the input
        textInput.value = '';
    } else {
        document.getElementById('audioStatus').innerHTML = `
            <span class="text-warning">
                <i class="fas fa-exclamation-triangle me-2"></i>
                Please enter some text to read
            </span>
        `;
    }
}

// Function to read current page
function readCurrentPage() {
    const currentPage = window.currentPageNumber || 1;
    
    // Try to extract text from current page first
    forceExtractCurrentPageText();
    
    // Wait a bit for text extraction, then start reading
    setTimeout(() => {
        if (window.pageTexts && window.pageTexts[currentPage] && window.pageTexts[currentPage].trim().length > 0) {
            startReading();
        } else {
            document.getElementById('audioStatus').innerHTML = `
                <span class="text-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Could not extract text from page ${currentPage}. Please use manual text input.
                </span>
            `;
        }
    }, 1000);
}

// Function to start reading from a specific line (for compatibility)
function startReadingFromLine(text, lineNumber, pageNumber) {
    console.log('Starting reading from line:', lineNumber, 'page:', pageNumber);
    
    if (!text || text.trim().length === 0) {
        document.getElementById('audioStatus').innerHTML = `
            <span class="text-warning">
                <i class="fas fa-exclamation-triangle me-2"></i>
                No text available for reading
            </span>
        `;
        return;
    }
    
    // Split text into chunks for better reading control
    textChunks = splitTextIntoChunks(text, 150);
    currentIndex = 0;
    
    // Update status
    document.getElementById('audioStatus').innerHTML = `
        <span class="text-info">
            <i class="fas fa-play me-2"></i>
            Reading from line ${lineNumber} of page ${pageNumber} (${textChunks.length} segments)
        </span>
    `;
    
    // Show reading controls
    document.getElementById('startAudioBtn').style.display = 'none';
    document.getElementById('resumeAudioBtn').style.display = 'none';
    document.getElementById('pauseAudioBtn').style.display = 'none';
    document.getElementById('stopAudioBtn').style.display = 'block';
    document.getElementById('audioInfo').style.display = 'block';
    
    // Start reading immediately
    isReading = true;
    readNextChunk();
}

// Function to force read current page
function forceReadCurrentPage() {
    readCurrentPage();
}

// Function to refresh current page text
function refreshCurrentPageText() {
    forceExtractCurrentPageText();
}

// Function to extract text from current visible page
function extractTextFromCurrentVisiblePage() {
    forceExtractCurrentPageText();
}

// Set up manual text input functionality
function setupManualTextInput() {
    const manualTextInput = document.getElementById('manualTextInput');
    if (manualTextInput) {
        // Add event listener for Enter key
        manualTextInput.addEventListener('keydown', function(event) {
            if (event.key === 'Enter' && !event.shiftKey) {
                event.preventDefault();
                readManualText();
            }
        });
        
        // Add event listener for paste events
        manualTextInput.addEventListener('paste', function(event) {
            // Auto-trigger reading after paste
            setTimeout(() => {
                if (this.value.trim().length > 0) {
                    readManualText();
                }
            }, 100);
        });
        
        console.log('Manual text input setup complete');
    }
}

// Function to find meaning of words (for the Word Meaning Finder)
function findMeaning() {
    const wordInput = document.getElementById('wordInput');
    const resultDiv = document.getElementById('result');
    
    if (!wordInput || !resultDiv) {
        console.log('Word meaning finder elements not found');
        return;
    }
    
    const word = wordInput.value.trim();
    if (!word) {
        resultDiv.innerHTML = '<p class="text-warning">Please enter a word or sentence to find its meaning.</p>';
        return;
    }
    
    // Show loading
    resultDiv.innerHTML = '<p class="text-info">Searching for meaning...</p>';
    
    // Simple dictionary lookup (you can replace this with a real API)
    const meanings = {
        'computer': 'An electronic device that processes data according to instructions.',
        'technology': 'The application of scientific knowledge for practical purposes.',
        'innovation': 'A new method, idea, or product.',
        'digital': 'Relating to or using computer technology.',
        'software': 'Programs and operating information used by a computer.',
        'hardware': 'The physical components of a computer system.',
        'internet': 'A global computer network providing information and communication.',
        'data': 'Facts and statistics collected for reference or analysis.',
        'algorithm': 'A process or set of rules to be followed in calculations.',
        'programming': 'The process of writing computer programs.'
    };
    
    // Simulate API delay
    setTimeout(() => {
        const lowerWord = word.toLowerCase();
        const meaning = meanings[lowerWord];
        
        if (meaning) {
            resultDiv.innerHTML = `
                <div class="border-bottom pb-2 mb-2">
                    <h6 class="text-primary">${word}</h6>
                    <p class="mb-0">${meaning}</p>
                </div>
                <small class="text-muted">This is a sample meaning. For more accurate definitions, consider using a dictionary API.</small>
            `;
        } else {
            resultDiv.innerHTML = `
                <p class="text-warning">No meaning found for "${word}".</p>
                <small class="text-muted">This is a sample word finder. For real definitions, consider integrating with a dictionary API.</small>
            `;
        }
    }, 1000);
}

// Function to clear manual text input
function clearManualText() {
    const textInput = document.getElementById('manualTextInput');
    if (textInput) {
        textInput.value = '';
        document.getElementById('audioStatus').innerHTML = `
            <span class="text-info">
                <i class="fas fa-info-circle me-2"></i>
                Ready to read. Enter text manually or try text selection.
            </span>
        `;
    }
}

// Function to resume reading
function resumeReading() {
    if (textChunks.length === 0) {
        document.getElementById('audioStatus').innerHTML = `
            <span class="text-warning">
                <i class="fas fa-exclamation-triangle me-2"></i>
                No text available to read
            </span>
        `;
        return;
    }
    
    isReading = true;
    
    document.getElementById('startAudioBtn').style.display = 'none';
    document.getElementById('resumeAudioBtn').style.display = 'none';
    document.getElementById('pauseAudioBtn').style.display = 'none';
    document.getElementById('stopAudioBtn').style.display = 'block';
    document.getElementById('audioInfo').style.display = 'block';
    
    // Update progress bar to show current position
    const progress = (currentIndex / textChunks.length) * 100;
    const progressBar = document.getElementById('audioProgressBar');
    if (progressBar) {
        progressBar.style.width = progress + '%';
    }
    
    updateReadingInfo();
    readNextChunk();
}

// Function to pause reading
function pauseReading() {
    if (isReading && currentUtterance) {
        speechSynthesis.pause();
        isReading = false;
        
        // Show resume button
        document.getElementById('resumeAudioBtn').style.display = 'block';
        document.getElementById('pauseAudioBtn').style.display = 'none';
        
        document.getElementById('audioStatus').innerHTML = `
            <span class="text-warning">
                <i class="fas fa-pause me-2"></i>
                Reading paused at segment ${currentIndex + 1} of ${textChunks.length}
            </span>
        `;
    }
}

// Function to stop reading
function stopReading() {
    if (currentUtterance) {
        speechSynthesis.cancel();
        currentUtterance = null;
    }
    
    isReading = false;
    currentIndex = 0;
    
    // Reset progress bar
    const progressBar = document.getElementById('audioProgressBar');
    if (progressBar) {
        progressBar.style.width = '0%';
    }
    
    // Show start button
    document.getElementById('startAudioBtn').style.display = 'block';
    document.getElementById('resumeAudioBtn').style.display = 'none';
    document.getElementById('pauseAudioBtn').style.display = 'none';
    document.getElementById('stopAudioBtn').style.display = 'none';
    document.getElementById('audioInfo').style.display = 'none';
    
    document.getElementById('audioStatus').innerHTML = `
        <span class="text-info">
            <i class="fas fa-stop me-2"></i>
            Reading stopped. Ready to start again.
        </span>
    `;
}

// Function to read the next chunk of text
function readNextChunk() {
    if (!isReading || currentIndex >= textChunks.length) {
        stopReading();
        return;
    }
    
    const chunk = textChunks[currentIndex];
    const statusDiv = document.getElementById('audioStatus');
    const progressBar = document.getElementById('audioProgressBar');
    
    // Update progress
    const progress = ((currentIndex + 1) / textChunks.length) * 100;
    if (progressBar) {
        progressBar.style.width = progress + '%';
    }
    
    // Update reading info
    updateReadingInfo();
    
    statusDiv.innerHTML = `
        <span class="text-success">
            <i class="fas fa-volume-up me-2"></i>
            Reading segment ${currentIndex + 1} of ${textChunks.length}
        </span>
    `;
    
    // Create and speak the utterance
    currentUtterance = new SpeechSynthesisUtterance(chunk);
    currentUtterance.rate = parseFloat(document.getElementById('speedControl').value);
    currentUtterance.pitch = 1.0;
    currentUtterance.volume = parseFloat(document.getElementById('volumeControl').value);
    
    // Set voice (try to use a good quality voice)
    const voices = speechSynthesis.getVoices();
    const preferredVoice = voices.find(voice => 
        voice.lang.includes('en') && (voice.name.includes('Google') || 
        voice.name.includes('Microsoft') || 
        voice.name.includes('Samantha'))
    );
    if (preferredVoice) {
        currentUtterance.voice = preferredVoice;
    }
    
    // Handle utterance end
    currentUtterance.onend = function() {
        currentIndex++;
        if (currentIndex < textChunks.length && isReading) {
            // Continue with next chunk
            setTimeout(readNextChunk, 100);
        } else {
            // Finished reading
            stopReading();
            statusDiv.innerHTML = `
                <span class="text-success">
                    <i class="fas fa-check me-2"></i>
                    Finished reading all text
                </span>
            `;
        }
    };
    
    // Handle utterance error
    currentUtterance.onerror = function(event) {
        console.error('Speech synthesis error:', event);
        statusDiv.innerHTML = `
            <span class="text-danger">
                <i class="fas fa-exclamation-triangle me-2"></i>
                Error reading text. Please try again.
            </span>
        `;
        stopReading();
    };
    
    // Start speaking
    speechSynthesis.speak(currentUtterance);
}

// Function to update reading speed
function updateSpeed() {
    const speed = document.getElementById('speedControl').value;
    const speedValue = document.getElementById('speedValue');
    if (speedValue) {
        speedValue.textContent = speed + 'x';
    }
    if (currentUtterance) {
        currentUtterance.rate = parseFloat(speed);
    }
}

// Function to update volume
function updateVolume() {
    const volume = document.getElementById('volumeControl').value;
    const volumeValue = document.getElementById('volumeValue');
    if (volumeValue) {
        volumeValue.textContent = Math.round(volume * 100) + '%';
    }
    if (currentUtterance) {
        currentUtterance.volume = parseFloat(volume);
    }
}

// Set up manual text input functionality
function setupManualTextInput() {
    const manualTextInput = document.getElementById('manualTextInput');
    if (manualTextInput) {
        // Add event listener for Enter key
        manualTextInput.addEventListener('keydown', function(event) {
            if (event.key === 'Enter' && !event.shiftKey) {
                event.preventDefault();
                readManualText();
            }
        });
        
        // Add event listener for paste events
        manualTextInput.addEventListener('paste', function(event) {
            // Auto-trigger reading after paste
            setTimeout(() => {
                if (this.value.trim().length > 0) {
                    readManualText();
                }
            }, 100);
        });
        
        console.log('Manual text input setup complete');
    }
}

// Page navigation functions
function goToPreviousPage() {
    const iframe = document.getElementById('pdfViewer');
    if (iframe) {
        try {
            // Try to access the PDF viewer's page navigation
            if (iframe.contentWindow && iframe.contentWindow.postMessage) {
                // Send message to PDF viewer to go to previous page
                iframe.contentWindow.postMessage({ type: 'prevPage' }, '*');
            }
            
            // Update our page tracking
            const currentPage = window.currentPageNumber || 1;
            if (currentPage > 1) {
                window.currentPageNumber = currentPage - 1;
                updatePageDisplay();
            }
            
            // Try to extract text from the new page
            setTimeout(() => {
                forceExtractCurrentPageText();
            }, 1000);
            
        } catch (error) {
            console.log('Error navigating to previous page:', error);
        }
    }
}

function goToNextPage() {
    const iframe = document.getElementById('pdfViewer');
    if (iframe) {
        try {
            // Try to access the PDF viewer's page navigation
            if (iframe.contentWindow && iframe.contentWindow.postMessage) {
                // Send message to PDF viewer to go to next page
                iframe.contentWindow.postMessage({ type: 'nextPage' }, '*');
            }
            
            // Update our page tracking
            const currentPage = window.currentPageNumber || 1;
            const totalPages = window.totalPages || 100;
            if (currentPage < totalPages) {
                window.currentPageNumber = currentPage + 1;
                updatePageDisplay();
            }
            
            // Try to extract text from the new page
            setTimeout(() => {
                forceExtractCurrentPageText();
            }, 1000);
            
        } catch (error) {
            console.log('Error navigating to next page:', error);
        }
    }
}

function goToSpecificPage() {
    const pageInput = document.getElementById('pageInput');
    const iframe = document.getElementById('pdfViewer');
    
    if (pageInput && iframe) {
        const pageNumber = parseInt(pageInput.value);
        const totalPages = window.totalPages || 100;
        
        if (pageNumber >= 1 && pageNumber <= totalPages) {
            // Try to send message to PDF viewer
            if (iframe.contentWindow && iframe.contentWindow.postMessage) {
                iframe.contentWindow.postMessage({ 
                    type: 'goToPage', 
                    page: pageNumber 
                }, '*');
            }
            
            // Update our page tracking
            window.currentPageNumber = pageNumber;
            updatePageDisplay();
            pageInput.value = '';
            
            // Try to extract text from the new page
            setTimeout(() => {
                forceExtractCurrentPageText();
            }, 1000);
            
        } else {
            alert(`Please enter a page number between 1 and ${totalPages}`);
        }
    }
}

function updatePageDisplay() {
    const currentPageDisplay = document.getElementById('currentPageDisplay');
    const currentPage = window.currentPageNumber || 1;
    const totalPages = window.totalPages || 100;
    
    if (currentPageDisplay) {
        currentPageDisplay.textContent = `Page ${currentPage} of ${totalPages}`;
    }
    
    // Update page input value
    const pageInput = document.getElementById('pageInput');
    if (pageInput) {
        pageInput.value = currentPage;
    }
}

// Audio control functions
function updateSpeed() {
    const speed = document.getElementById('speedControl').value;
    document.getElementById('speedValue').textContent = speed + 'x';
    if (currentUtterance) {
        currentUtterance.rate = parseFloat(speed);
    }
}

function updateVolume() {
    const volume = document.getElementById('volumeControl').value;
    document.getElementById('volumeValue').textContent = Math.round(volume * 100) + '%';
    if (currentUtterance) {
        currentUtterance.volume = parseFloat(volume);
    }
}

// Utility functions
function splitTextIntoChunks(text, maxLength) {
    const chunks = [];
    let currentChunk = '';
    
    const sentences = text.split(/[.!?]+/).filter(s => s.trim().length > 0);
    
    for (const sentence of sentences) {
        const trimmedSentence = sentence.trim();
        
        if (currentChunk.length + trimmedSentence.length <= maxLength) {
            currentChunk += (currentChunk ? '. ' : '') + trimmedSentence;
        } else {
            if (currentChunk) {
                chunks.push(currentChunk + '.');
            }
            currentChunk = trimmedSentence;
        }
    }
    
    if (currentChunk) {
        chunks.push(currentChunk + '.');
    }
    
    return chunks;
}

// Function to save reading progress
function saveReadingProgress() {
    if (bookId && currentIndex > 0) {
        const progress = {
            bookId: bookId,
            currentIndex: currentIndex,
            totalChunks: textChunks.length,
            timestamp: Date.now()
        };
        localStorage.setItem(`readingProgress_${bookId}`, JSON.stringify(progress));
    }
}

// Function to load reading progress
function loadReadingProgress() {
    if (bookId) {
        const savedProgress = localStorage.getItem(`readingProgress_${bookId}`);
        if (savedProgress) {
            try {
                const progress = JSON.parse(savedProgress);
                if (progress.bookId === bookId) {
                    currentIndex = progress.currentIndex;
                    // Don't auto-resume, just show the progress
                    console.log('Loaded reading progress:', progress);
                }
            } catch (error) {
                console.log('Error loading reading progress:', error);
            }
        }
    }
}

// Function to set up page change detection
function setupPageChangeDetection() {
    // Try to detect page changes from the iframe
    const iframe = document.getElementById('pdfViewer');
    if (iframe) {
        // Listen for messages from the PDF viewer
        window.addEventListener('message', function(event) {
            if (event.data && event.data.type === 'pagechange') {
                window.currentPageNumber = event.data.page;
                updatePageDisplay();
            }
        });
        
        // Also try to detect page changes by monitoring the iframe
        setInterval(() => {
            try {
                // For browser PDF viewers, we can't directly access page info
                // So we'll use our own page tracking
                if (!window.currentPageNumber) {
                    window.currentPageNumber = 1;
                }
                if (!window.totalPages) {
                    window.totalPages = 100; // Default fallback
                }
            } catch (error) {
                console.log('Error in page change detection:', error);
            }
        }, 5000);
        
        console.log('Page change detection setup complete');
    }
}

// Function to clear manual text input
function clearManualText() {
    const textInput = document.getElementById('manualTextInput');
    if (textInput) {
        textInput.value = '';
        document.getElementById('audioStatus').innerHTML = `
            <span class="text-info">
                <i class="fas fa-info-circle me-2"></i>
                Ready to read. Enter text manually or try text selection.
            </span>
        `;
    }
}

// Function to resume reading
function resumeReading() {
    if (textChunks.length === 0) {
        document.getElementById('audioStatus').innerHTML = `
            <span class="text-warning">
                <i class="fas fa-exclamation-triangle me-2"></i>
                No text available to read
            </span>
        `;
        return;
    }
    
    isReading = true;
    
    document.getElementById('startAudioBtn').style.display = 'none';
    document.getElementById('resumeAudioBtn').style.display = 'none';
    document.getElementById('pauseAudioBtn').style.display = 'none';
    document.getElementById('stopAudioBtn').style.display = 'block';
    document.getElementById('audioInfo').style.display = 'block';
    
    // Update progress bar to show current position
    const progress = (currentIndex / textChunks.length) * 100;
    const progressBar = document.getElementById('audioProgressBar');
    if (progressBar) {
        progressBar.style.width = progress + '%';
    }
    
    updateReadingInfo();
    readNextChunk();
}

// PDF text extraction functions
async function initializePDFTextExtraction() {
    const statusDiv = document.getElementById('audioStatus');
    
    try {
        // Initialize PDF.js
        if (typeof pdfjsLib !== 'undefined') {
            statusDiv.innerHTML = 'PDF text extraction initialized with PDF.js.';
            console.log('PDF text extraction system ready with PDF.js');
        } else {
            statusDiv.innerHTML = 'PDF.js not available. Using fallback methods.';
            console.log('PDF.js not available, using fallback methods');
        }
    } catch (error) {
        console.error('Error initializing PDF text extraction:', error);
        statusDiv.innerHTML = '<span class="text-warning">PDF text extraction failed. Using fallback methods.</span>';
    }
}

// Extract text from all pages using PDF.js
async function extractTextFromAllPages() {
    try {
        if (typeof pdfjsLib === 'undefined') {
            console.log('PDF.js not available for text extraction');
            return false;
        }

        const pdfUrl = document.getElementById('pdfViewer')?.src || window.location.href;
        if (!pdfUrl) {
            console.log('No PDF URL found');
            return false;
        }

        const loadingTask = pdfjsLib.getDocument(pdfUrl);
        const pdf = await loadingTask.promise;
        
        if (!window.pageTexts) window.pageTexts = {};
        
        for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
            try {
                const page = await pdf.getPage(pageNum);
                const textContent = await page.getTextContent();
                const pageText = textContent.items.map(item => item.str).join(' ');
                window.pageTexts[pageNum] = pageText;
                console.log(`Text extracted for page ${pageNum}:`, pageText.substring(0, 100) + '...');
            } catch (pageError) {
                console.log(`Error extracting text from page ${pageNum}:`, pageError.message);
                window.pageTexts[pageNum] = '';
            }
        }
        
        totalPages = pdf.numPages;
        console.log(`Successfully extracted text from ${pdf.numPages} pages`);
        return true;
    } catch (error) {
        console.error('Error extracting text from all pages:', error);
        return false;
    }
}

// Extract text from current visible page using PDF.js
async function extractTextFromCurrentVisiblePage() {
    const currentPage = window.currentPageNumber || 1;
    
    try {
        if (typeof pdfjsLib !== 'undefined') {
            const pdfUrl = document.getElementById('pdfViewer')?.src || window.location.href;
            if (pdfUrl) {
                const loadingTask = pdfjsLib.getDocument(pdfUrl);
                const pdf = await loadingTask.promise;
                
                if (currentPage <= pdf.numPages) {
                    const page = await pdf.getPage(currentPage);
                    const textContent = await page.getTextContent();
                    const pageText = textContent.items.map(item => item.str).join(' ');
                    
                    if (!window.pageTexts) window.pageTexts = {};
                    window.pageTexts[currentPage] = pageText;
                    
                    console.log(`Text extracted for page ${currentPage}:`, pageText.substring(0, 100) + '...');
                    document.getElementById('audioStatus').innerHTML = `
                        <span class="text-success">
                            <i class="fas fa-check me-2"></i>
                            Text extracted for page ${currentPage}
                        </span>
                    `;
                    return true;
                }
            }
        }
        
        // Fallback to iframe method
        return forceExtractCurrentPageText();
    } catch (error) {
        console.error('Error extracting text from current page:', error);
        // Fallback to iframe method
        return forceExtractCurrentPageText();
    }
}

// Enhanced text extraction using PDF.js
async function extractTextUsingPDFJS() {
    try {
        if (typeof pdfjsLib === 'undefined') {
            console.log('PDF.js not available');
            return false;
        }

        const pdfUrl = document.getElementById('pdfViewer')?.src || window.location.href;
        if (!pdfUrl) {
            console.log('No PDF URL found');
            return false;
        }

        const loadingTask = pdfjsLib.getDocument(pdfUrl);
        const pdf = await loadingTask.promise;
        
        if (!window.pageTexts) window.pageTexts = {};
        
        // Extract text from first few pages to test
        const pagesToExtract = Math.min(3, pdf.numPages);
        for (let pageNum = 1; pageNum <= pagesToExtract; pageNum++) {
            try {
                const page = await pdf.getPage(pageNum);
                const textContent = await page.getTextContent();
                const pageText = textContent.items.map(item => item.str).join(' ');
                window.pageTexts[pageNum] = pageText;
                console.log(`Text extracted for page ${pageNum}:`, pageText.substring(0, 100) + '...');
            } catch (pageError) {
                console.log(`Error extracting text from page ${pageNum}:`, pageError.message);
                window.pageTexts[pageNum] = '';
            }
        }
        
        totalPages = pdf.numPages;
        console.log(`Successfully extracted text from ${pagesToExtract} pages using PDF.js`);
        return true;
    } catch (error) {
        console.error('Error using PDF.js for text extraction:', error);
        return false;
    }
}

// Create intelligent fallback text
function createIntelligentFallbackText() {
    const fallbackTexts = [
        "This is a sample text for demonstration purposes. You can manually input the text you want to read from the manual text input box below.",
        "If automatic text extraction is not working, please use the manual text input feature located at the bottom of the right sidebar.",
        "The PDF viewer is ready. You can navigate through pages and use the manual text input to begin your reading experience.",
        "Welcome to the PDF reader. Use the page navigation controls above and the manual text input below to begin your reading experience."
    ];
    
    return fallbackTexts[Math.floor(Math.random() * fallbackTexts.length)];
}

// Fallback text extraction from iframe
function extractTextFromIframe() {
    try {
        const iframe = document.getElementById('pdfViewer');
        if (iframe && iframe.contentWindow && iframe.contentWindow.document) {
            const iframeDoc = iframe.contentWindow.document;
            const textContent = iframeDoc.body ? iframeDoc.body.textContent : '';
            return textContent || '';
        }
    } catch (error) {
        console.log('Error extracting text from iframe:', error.message);
    }
    return '';
}

// Force extract current page text (fallback method)
function forceExtractCurrentPageText() {
    const currentPage = window.currentPageNumber || 1;
    
    // First try to get the PDF viewer iframe
    const iframe = document.getElementById('pdfViewer');
    if (!iframe) {
        console.log('PDF viewer iframe not found');
        document.getElementById('audioStatus').innerHTML = `<span class="text-warning">PDF viewer not found. Use manual text input below.</span>`;
        return false;
    }
    
    // Try to extract text from iframe
    const extractedText = extractTextFromIframe();
    
    if (extractedText && extractedText.trim().length > 0) {
        if (!window.pageTexts) window.pageTexts = {};
        window.pageTexts[currentPage] = extractedText;
        console.log('Text extracted for page', currentPage, 'Length:', extractedText.length);
        document.getElementById('audioStatus').innerHTML = `<span class="text-success">Text extracted for page ${currentPage} (${extractedText.length} characters)</span>`;
        return true;
    } else {
        console.log('Failed to extract text for page', currentPage);
        console.log('Iframe src:', iframe.src);
        console.log('Iframe content accessible:', iframe.contentWindow ? 'Yes' : 'No');
        
        // Show helpful message with manual input suggestion
        document.getElementById('audioStatus').innerHTML = `
            <span class="text-warning">
                <i class="fas fa-exclamation-triangle me-2"></i>
                Failed to extract text for page ${currentPage}. 
                <br><small>Use the manual text input box below to type or paste the text you want to read.</small>
            </span>
        `;
        return false;
    }
}

// Function to read manually entered text
function readManualText() {
    const textInput = document.getElementById('manualTextInput');
    if (textInput && textInput.value.trim()) {
        const manualText = textInput.value.trim();
        console.log('Reading manual text:', manualText.substring(0, 100));
        
        // Start reading from manual text
        startReadingFromLine(manualText, 1, window.currentPageNumber || 1);
        
        // Show success message
        document.getElementById('audioStatus').innerHTML = `<span class="text-success">Reading manual text (${manualText.length} characters)</span>`;
        
        // Clear the input
        textInput.value = '';
    } else {
        document.getElementById('audioStatus').innerHTML = `<span class="text-warning">Please enter some text to read</span>`;
    }
}

// Function to clear manual text input
function clearManualText() {
    const textInput = document.getElementById('manualTextInput');
    if (textInput) {
        textInput.value = '';
        document.getElementById('audioStatus').innerHTML = 'Ready to read. Enter text manually or try text selection.';
    }
}

// Additional functions for the buttons
function readCurrentPage() {
    const currentPage = window.currentPageNumber || 1;
    if (window.pageTexts && window.pageTexts[currentPage]) {
        startReadingFromLine(window.pageTexts[currentPage], 1, currentPage);
    } else {
        forceExtractCurrentPageText();
        setTimeout(() => {
            if (window.pageTexts && window.pageTexts[currentPage]) {
                startReadingFromLine(window.pageTexts[currentPage], 1, currentPage);
            }
        }, 1000);
    }
}

function forceReadCurrentPage() {
    readCurrentPage();
}

function refreshCurrentPageText() {
    forceExtractCurrentPageText();
}

function extractTextFromCurrentVisiblePage() {
    forceExtractCurrentPageText();
}

// Function to update reading information display
function updateReadingInfo() {
    const currentPosition = document.getElementById('currentPosition');
    const totalChunks = document.getElementById('totalChunks');
    const timeRemaining = document.getElementById('timeRemaining');
    
    if (currentPosition) {
        currentPosition.textContent = currentIndex + 1;
    }
    if (totalChunks) {
        totalChunks.textContent = textChunks.length;
    }
    
    // Calculate estimated time remaining (assuming average 3 seconds per chunk)
    if (timeRemaining) {
        const remainingChunks = textChunks.length - currentIndex;
        const estimatedSeconds = remainingChunks * 3;
        const minutes = Math.floor(estimatedSeconds / 60);
        const seconds = estimatedSeconds % 60;
        
        if (minutes > 0) {
            timeRemaining.textContent = `~${minutes}m ${seconds}s remaining`;
        } else {
            timeRemaining.textContent = `~${seconds}s remaining`;
        }
    }
}

// Function to split text into readable chunks
function splitTextIntoChunks(text, maxLength) {
    const chunks = [];
    let currentChunk = '';
    
    // Split by sentences first
    const sentences = text.split(/[.!?]+/).filter(s => s.trim().length > 0);
    
    for (const sentence of sentences) {
        const trimmedSentence = sentence.trim();
        
        if (currentChunk.length + trimmedSentence.length <= maxLength) {
            // Add sentence to current chunk
            currentChunk += (currentChunk ? ' ' : '') + trimmedSentence;
        } else {
            // Current chunk is full, save it and start new one
            if (currentChunk) {
                chunks.push(currentChunk);
            }
            currentChunk = trimmedSentence;
        }
    }
    
    // Add the last chunk if it has content
    if (currentChunk) {
        chunks.push(currentChunk);
    }
    
    // If no chunks were created, split by words
    if (chunks.length === 0) {
        const words = text.split(' ');
        currentChunk = '';
        
        for (const word of words) {
            if (currentChunk.length + word.length + 1 <= maxLength) {
                currentChunk += (currentChunk ? ' ' : '') + word;
            } else {
                if (currentChunk) {
                    chunks.push(currentChunk);
                }
                currentChunk = word;
            }
        }
        
        if (currentChunk) {
            chunks.push(currentChunk);
        }
    }
    
    return chunks;
}
