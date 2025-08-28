@extends('master') 

@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/pdf-viewer.css') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
@endsection

@section('userpanel')
<div class="container-fluid">
    <div class="row" style="height: 100vh;">

        <!-- Left Side PDF -->
        <div class="col-md-9" style="height:100%; padding:0;">
            <iframe src="{{ $pdfUrl }}" 
                    width="100%" 
                    height="100%" 
                    style="border:none;" 
                    id="pdfViewer">
            </iframe>
        </div>

        <!-- Right Side -->
        <div class="col-md-3 d-flex flex-column justify-content-start align-items-center bg-light overflow-auto p-3" style="height:100%;">

            <!-- Word Meaning Finder -->
            <h4 class="mb-3">Word Meaning Finder</h4>
            
            <div class="mb-3 w-100">
                <input type="text" id="wordInput" 
                       class="form-control" 
                       placeholder="Enter word or sentence...">
            </div>
            
            <div class="mb-3 w-100">
                <button onclick="findMeaning()" 
                        class="btn btn-primary w-100">
                    Find Meaning
                </button>
            </div>
            
            <div id="result" 
                 class="w-100 p-2 border rounded bg-white" 
                 style="min-height:150px; overflow:auto;">
            </div>

            <!-- Audio Controls Section -->
           <div class="audio-controls w-100">
                <h5 class="text-center mb-3">
                    <i class="fas fa-headphones me-2"></i>Audio Reader
                </h5>
                
                <div class="d-grid gap-2">
                    <button id="startAudioBtn" class="audio-btn">
                        <i class="fas fa-play me-2"></i>Start Reading
                    </button>
                    
                    <button id="resumeAudioBtn" class="audio-btn" style="display: none;">
                        <i class="fas fa-play me-2"></i>Resume Reading
                    </button>
                    
                    <button id="pauseAudioBtn" class="audio-btn hidden-button" style="display: none;">
                        <i class="fas fa-pause me-2"></i>Pause
                    </button>
                    
                    <button id="stopAudioBtn" class="audio-btn" style="display: none;">
                        <i class="fas fa-stop me-2"></i>Stop
                    </button>
                    
                    <button id="readCurrentPageBtn" class="btn btn-success btn-lg">
                        <i class="fas fa-play me-2"></i>Read Current Page
                    </button>
                </div>
                
                <!-- Page Navigation -->
                <div class="page-navigation mt-3">
                    <h6 class="text-center mb-2">Page Navigation</h6>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <button id="prevPageBtn" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-chevron-left"></i> Previous
                        </button>
                        <span id="currentPageDisplay" class="text-muted">Page 1 of {{ $book->total_pages ?? '?' }}</span>
                        <button id="nextPageBtn" class="btn btn-sm btn-outline-primary">
                            Next <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                    <div class="d-flex justify-content-center mb-2">
                        <div class="input-group input-group-sm" style="max-width: 200px;">
                            <input type="number" id="pageInput" class="form-control" placeholder="Page #" min="1" max="{{ $book->total_pages ?? 100 }}">
                            <button id="goToPageBtn" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    <div class="text-center mb-2">
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Enter page number and click arrow to navigate and read that page
                        </small>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button id="readPageBtn" class="btn btn-sm btn-success">
                            <i class="fas fa-play me-1"></i>Read This Page
                        </button>
                    </div>
                    <div class="d-flex justify-content-center mt-2">
                        <button id="refreshPageBtn" class="btn btn-sm btn-outline-warning hidden-button">
                            <i class="fas fa-sync-alt me-1"></i>Refresh Page Text
                        </button>
                    </div>
                    <div class="d-flex justify-content-center mt-2">
                        <button id="extractTextBtn" class="btn btn-sm btn-outline-info">
                            <i class="fas fa-file-text me-1"></i>Extract Page Text
                        </button>
                    </div>
                    <div class="d-flex justify-content-center mt-2">
                        <button id="forceReadBtn" class="btn btn-sm btn-outline-success hidden-button">
                            <i class="fas fa-volume-up me-1"></i>Force Read Page
                        </button>
                    </div>
                </div>
                
                <!-- Audio Settings -->
                <div class="audio-settings">
                    <div class="setting-group">
                        <label>Speed:</label>
                        <input type="range" id="speedControl" min="0.5" max="2" step="0.1" value="1" />
                        <span id="speedValue">1.0x</span>
                    </div>
                    <div class="setting-group">
                        <label>Volume:</label>
                        <input type="range" id="volumeControl" min="0" max="1" step="0.1" value="1" />
                        <span id="volumeValue">100%</span>
                    </div>
                </div>
                
                <div class="audio-progress">
                    <div class="audio-progress-bar" id="audioProgressBar"></div>
                </div>
                
                <div class="audio-status" id="audioStatus">
                    Ready to read: {{ $book->title ?? 'Book' }}
                </div>
                
                <div class="audio-notification" id="audioNotification" style="display: none;">
                    <div class="alert alert-info text-center">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Auto-start enabled!</strong> Audio reading will begin automatically in a few seconds.
                    </div>
                </div>
                
                <div class="audio-info" id="audioInfo" style="display: none;">
                    <div class="text-center">
                        <small class="text-muted">
                            <span id="currentPosition">0</span> of <span id="totalChunks">0</span> segments
                        </small>
                        <br>
                        <small class="text-muted" id="timeRemaining"></small>
                    </div>
                </div>
                
                <!-- Manual Text Input -->
                <div class="manual-text-input mt-3" style="background: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #dee2e6;">
                    <h6><i class="fas fa-keyboard me-2"></i>Manual Text Input</h6>
                    
                    <textarea id="manualTextInput" class="form-control" rows="3" placeholder="Type or paste the text you want to read from..."></textarea>
                    <div class="mt-2 d-flex gap-2">
                        <button onclick="readManualText()" class="btn btn-sm btn-primary flex-fill">
                            <i class="fas fa-play me-1"></i>Start Reading from This Text
                        </button>
                        <button onclick="clearManualText()" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-times me-1"></i>Clear
                        </button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<script>
const GEMINI_API_KEY = "AIzaSyCrRbzMIgVilC1UyuN2snirEebEiQzXb8U"; 

async function findMeaning() {
    const word = document.getElementById("wordInput").value.trim();
    if (!word) {
        document.getElementById("result").innerHTML = "<b>Please enter a word or sentence.</b>";
        return;
    }

    try {
        const prompt = `
        You are a dictionary assistant.
        Input: "${word}"
        
        If it's a single word → return JSON like this:
        {
          "original": "word",
          "english_meaning": "English meaning here",
          "synonyms": ["synonym1", "synonym2"],
          "urdu_meaning": "اردو مطلب یہاں"
        }

        If it's a sentence → return JSON like this:
        {
          "original": "sentence",
          "english_meaning": "English translation",
          "urdu_meaning": "اردو ترجمہ"
        }
        ONLY return valid JSON, nothing else.
        `;

        const response = await fetch(
            "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=" + GEMINI_API_KEY,
            {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({
                    contents: [{ role: "user", parts: [{ text: prompt }] }]
                }),
            }
        );

        const data = await response.json();
        console.log("Gemini raw response:", data);

        let textOutput = data?.candidates?.[0]?.content?.parts?.[0]?.text || "{}";

        // Clean any extra text (ensure JSON only)
        const jsonStr = textOutput.match(/\{[\s\S]*\}/)?.[0];
        let resultData = JSON.parse(jsonStr);

        // Build HTML Output
        let html = `<b>Original:</b> ${resultData.original || word}<br>`;
        if (resultData.english_meaning) html += `<b>English Meaning:</b> ${resultData.english_meaning}<br>`;
        if (resultData.synonyms) html += `<b>Synonyms:</b> ${resultData.synonyms.join(", ")}<br>`;
        if (resultData.urdu_meaning) html += `<b>Urdu Meaning:</b> ${resultData.urdu_meaning}<br>`;

        document.getElementById("result").innerHTML = html;

    } catch (error) {
        document.getElementById("result").innerHTML = " Error fetching meaning!";
        console.error(error);
    }
}
</script>
<!-- Audio Scripts -->
<script>
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
let bookId = '{{ $book->id ?? "unknown" }}';
let bookTitle = '{{ $book->title ?? "Book" }}';
let bookAuthor = '{{ $book->author ?? "Author" }}';

// Initialize audio functionality
document.addEventListener('DOMContentLoaded', function() {
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
    
    startBtn.addEventListener('click', startReading);
    resumeBtn.addEventListener('click', resumeReading);
    pauseBtn.addEventListener('click', pauseReading);
    stopBtn.addEventListener('click', stopReading);
    readCurrentPageBtn.addEventListener('click', forceReadCurrentPage);
    prevPageBtn.addEventListener('click', goToPreviousPage);
    nextPageBtn.addEventListener('click', goToNextPage);
    readPageBtn.addEventListener('click', readCurrentPage);
    goToPageBtn.addEventListener('click', goToSpecificPage);
    refreshPageBtn.addEventListener('click', refreshCurrentPageText);
    extractTextBtn.addEventListener('click', extractTextFromCurrentVisiblePage);
    forceReadBtn.addEventListener('click', forceReadCurrentPage);
    
    // Allow Enter key on page input
    pageInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            goToSpecificPage();
        }
    });
    
    speedControl.addEventListener('input', updateSpeed);
    volumeControl.addEventListener('input', updateVolume);
    
    // Check if speech synthesis is supported
    if (!speechSynthesis) {
        statusDiv.innerHTML = '<span class="text-danger">Audio reading is not supported in this browser</span>';
        startBtn.disabled = true;
        readCurrentPageBtn.disabled = true;
        readPageBtn.disabled = true;
        return;
    }
    
    // Initialize current page tracking
    window.currentPageNumber = 1;
    updatePageDisplay();
    
    setupPageChangeDetection();
    
    // Set up PDF viewer click detection
    setupPDFViewerClickDetection();
    // Load saved reading progress
    loadReadingProgress();
    // Initialize PDF text extraction with a delay to ensure everything is loaded
    setTimeout(() => {
        initializePDFTextExtraction();
    }, 1000);
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

// Function to detect clicks in the PDF viewer
function setupPDFViewerClickDetection() {
    const iframe = document.getElementById('pdfViewer');
    if (iframe) {
        // Add click event listener to the iframe
        iframe.addEventListener('click', function() {
            console.log('PDF viewer clicked');
            // Try to detect which page was clicked
            setTimeout(() => {
                try {
                    if (iframe.contentWindow && iframe.contentWindow.PDFViewerApplication) {
                        const clickedPage = iframe.contentWindow.PDFViewerApplication.page;
                        if (clickedPage && clickedPage !== window.currentPageNumber) {
                            console.log('Page changed to:', clickedPage);
                            window.currentPageNumber = clickedPage;
                            updatePageDisplay();
                            
                            // Automatically extract and read the clicked page
                            setTimeout(() => {
                                const newPageText = extractTextFromIframe();
                                if (newPageText && newPageText.trim().length > 0) {
                                    // Store the new page text
                                    if (!window.pageTexts) window.pageTexts = {};
                                    window.pageTexts[clickedPage] = newPageText;
                                    
                                    console.log('Automatically extracted text from clicked page:', newPageText.substring(0, 150) + '...');
                                    
                                    // Update status
                                    document.getElementById('audioStatus').innerHTML = `Page ${clickedPage} content ready for reading`;
                                } else {
                                    document.getElementById('audioStatus').innerHTML = `Page ${clickedPage} loaded, click "Read Current Page" to extract content`;
                                }
                            }, 500);
                        }
                    }
                } catch (error) {
                    console.error('Error detecting clicked page:', error);
                }
            }, 100);
        });
    }
}

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

async function initializePDFTextExtraction() {
    const statusDiv = document.getElementById('audioStatus');
    const pdfUrl = '{{ $pdfUrl }}';
    
    try {
        statusDiv.innerHTML = 'Loading PDF for text extraction...';
        
        // Load the PDF document
        const loadingTask = pdfjsLib.getDocument(pdfUrl);
        pdfDocument = await loadingTask.promise;
        totalPages = pdfDocument.numPages;
        
        statusDiv.innerHTML = `PDF loaded: ${totalPages} pages. Extracting text...`;
        
        // Extract text from all pages
        await extractTextFromAllPages();
        
    } catch (error) {
        console.error('Error loading PDF:', error);
        statusDiv.innerHTML = '<span class="text-warning">PDF loading failed. Using fallback text.</span>';
        useEnhancedFallback();
    }
}

async function extractTextFromAllPages() {
    const statusDiv = document.getElementById('audioStatus');
    let allText = '';
    
    try {
        // Extract text from all pages with enhanced method
        for (let pageNum = 1; pageNum <= totalPages; pageNum++) {
            statusDiv.innerHTML = `Extracting text from page ${pageNum} of ${totalPages}...`;
            
            try {
                const page = await pdfDocument.getPage(pageNum);
                                let pageText = await extractTextWithMultipleMethods(page);
                
                if (pageText && pageText.trim().length > 0) {
                 
                    if (!window.pageTexts) window.pageTexts = {};
                    window.pageTexts[pageNum] = pageText;
                    
                    allText += pageText + ' ';
                    console.log(`Page ${pageNum} text extracted successfully:`, pageText.substring(0, 150) + '...');
                } else {
                    // If still no text, create a more specific fallback
                    const fallbackText = `Page ${pageNum} of ${bookTitle} by ${bookAuthor}. This page contains content that could not be extracted automatically.`;
                    window.pageTexts[pageNum] = fallbackText;
                    allText += fallbackText + ' ';
                    console.log(`Page ${pageNum} fallback text created`);
                }
                
                const progress = (pageNum / totalPages) * 100;
                document.getElementById('audioProgressBar').style.width = progress + '%';
                
            } catch (pageError) {
                console.error(`Error extracting from page ${pageNum}:`, pageError);
                const fallbackText = `Page ${pageNum} of ${bookTitle} by ${bookAuthor}. This page contains content that could not be extracted.`;
                window.pageTexts[pageNum] = fallbackText;
                allText += fallbackText + ' ';
            }
        }
        
        if (allText.trim().length > 50) {
            currentText = cleanText(allText);
            textChunks = splitTextIntoChunks(currentText, 200);
            
            statusDiv.innerHTML = `Ready to read: ${textChunks.length} text segments from ${totalPages} pages`;
            document.getElementById('startAudioBtn').disabled = false;
            document.getElementById('readCurrentPageBtn').disabled = false;
            document.getElementById('readPageBtn').disabled = false;
   
            updatePageDisplay();
            
            // Show auto-start notification
            document.getElementById('audioNotification').style.display = 'block';
                        setTimeout(() => {
                if (textChunks.length > 0) {
                    document.getElementById('audioNotification').style.display = 'none';
                    startReading();
                }
            }, 3000);
            
        } else {
            throw new Error('No readable text found');
        }
        
    } catch (error) {
        console.error('Error extracting text:', error);
        statusDiv.innerHTML = '<span class="text-warning">Text extraction failed. Using enhanced fallback.</span>';
        useEnhancedFallback();
    }
}
async function extractTextWithMultipleMethods(page) {
    let extractedText = '';
        try {
        const iframe = document.getElementById('pdfViewer');
        if (iframe && iframe.contentWindow) {
            // Try to access the PDF viewer's content directly
            const pdfViewer = iframe.contentWindow.PDFViewerApplication;
            if (pdfViewer && pdfViewer.pages) {
                const currentPage = pdfViewer.page;
                const pageElement = pdfViewer.pages[currentPage - 1];
                
                if (pageElement) {
                    const textElements = pageElement.querySelectorAll('.textLayer div');
                    if (textElements.length > 0) {
                        extractedText = Array.from(textElements)
                            .map(el => el.textContent || el.innerText)
                            .filter(text => text && text.trim().length > 0)
                            .join(' ');
                        
                        if (extractedText.trim().length > 0) {
                            console.log('Method 1 (iframe) successful, extracted:', extractedText.substring(0, 150) + '...');
                            return extractedText;
                        }
                    }
                }
            }
        }
    } catch (error) {
        console.log('Method 1 (iframe) failed:', error.message);
    }
    
    try {
        const textContent = await page.getTextContent({
            normalizeWhitespace: true,
            disableCombineTextItems: false
        });
        
        if (textContent && textContent.items && textContent.items.length > 0) {
            const textItems = textContent.items;
            let reconstructedText = '';
            let lastY = 0;
            
            for (let i = 0; i < textItems.length; i++) {
                const item = textItems[i];
                const currentY = item.transform[5];
                                if (i > 0 && Math.abs(currentY - lastY) > 10) {
                    reconstructedText += ' ';
                }
                
                reconstructedText += item.str;
                lastY = currentY;
            }
            
            if (reconstructedText.trim().length > 0) {
                console.log('Method 2 (enhanced PDF.js) successful, extracted:', reconstructedText.substring(0, 150) + '...');
                return reconstructedText;
            }
        }
    } catch (error) {
        console.log('Method 2 (enhanced PDF.js) failed:', error.message);
    }
        try {
        const textContent = await page.getTextContent({
            normalizeWhitespace: false,
            disableCombineTextItems: true
        });
        
        if (textContent && textContent.items && textContent.items.length > 0) {
            extractedText = textContent.items.map(item => item.str).join(' ');
            if (extractedText.trim().length > 0) {
                console.log('Method 3 (alternative PDF.js) successful, extracted:', extractedText.substring(0, 150) + '...');
                return extractedText;
            }
        }
    } catch (error) {
        console.log('Method 3 (alternative PDF.js) failed:', error.message);
    }
    
    try {
        const annotations = await page.getAnnotations();
        if (annotations && annotations.length > 0) {
            const annotationTexts = annotations
                .filter(ann => ann.contents)
                .map(ann => ann.contents)
                .filter(text => text && text.trim().length > 0);
            
            if (annotationTexts.length > 0) {
                extractedText = annotationTexts.join(' ');
                console.log('Method 4 (annotations) successful, extracted:', extractedText.substring(0, 150) + '...');
                return extractedText;
            }
        }
    } catch (error) {
        console.log('Method 4 (annotations) failed:', error.message);
    }
    
    console.log('All text extraction methods failed for this page');
    return '';
}

function cleanText(text) {
    return text
        .replace(/\s+/g, ' ') 
        .replace(/\n+/g, ' ') 
        .replace(/\t+/g, ' ')
        .trim();
}

function useEnhancedFallback() {
    const bookTitle = '{{ $book->title ?? "Book" }}';
    const author = '{{ $book->author ?? "Author" }}';
    
    currentText = createBookContent();
    
    textChunks = splitTextIntoChunks(currentText, 150);
    document.getElementById('startAudioBtn').disabled = false;
    
    document.getElementById('audioNotification').style.display = 'block';
    
    setTimeout(() => {
        if (textChunks.length > 0) {
            document.getElementById('audioNotification').style.display = 'none';
            startReading();
        }
    }, 2000);
}

// Add a function to create book-specific content when PDF extraction fails
function createBookContent() {
    const bookTitle = '{{ $book->title ?? "Book" }}';
    const author = '{{ $book->author ?? "Author" }}';
    const description = '{{ $book->description ?? "" }}';
    
    let content = `Welcome to ${bookTitle} by ${author}. `;
    
    if (description && description.trim().length > 0) {
        content += description + ' ';
    }
    
    content += `This audio reading session will guide you through the book's content. The book explores various topics and provides valuable insights. You can adjust the reading speed and volume to your preference. The audio reader will automatically continue reading, allowing you to multitask while learning. Let's begin this educational journey together.`;
    
    return content;
}

function splitTextIntoChunks(text, maxLength) {
    const chunks = [];
    const sentences = text.split(/[.!?]+/).filter(s => s.trim().length > 0);
    
    let currentChunk = '';
    for (let sentence of sentences) {
        if ((currentChunk + sentence).length > maxLength) {
            if (currentChunk) chunks.push(currentChunk.trim());
            currentChunk = sentence;
        } else {
            currentChunk += (currentChunk ? '. ' : '') + sentence;
        }
    }
    if (currentChunk) chunks.push(currentChunk.trim());
    
    return chunks;
}

function startReading() {
    if (textChunks.length === 0) {
        document.getElementById('audioStatus').innerHTML = '<span class="text-danger">No text available to read</span>';
        return;
    }
    
    isReading = true;
    currentIndex = 0;
    
    document.getElementById('startAudioBtn').style.display = 'none';
    document.getElementById('resumeAudioBtn').style.display = 'none';
    document.getElementById('pauseAudioBtn').style.display = 'block';
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
    document.getElementById('pauseAudioBtn').style.display = 'block';
    document.getElementById('stopAudioBtn').style.display = 'block';
    document.getElementById('audioInfo').style.display = 'block';
    
    // Update progress bar to show current position
    const progress = (currentIndex / textChunks.length) * 100;
    document.getElementById('audioProgressBar').style.width = progress + '%';
    
    updateReadingInfo();
    readNextChunk();
}

function updateReadingInfo() {
    document.getElementById('currentPosition').textContent = currentIndex + 1;
    document.getElementById('totalChunks').textContent = textChunks.length;
    
    // Calculate estimated time remaining (assuming average 3 seconds per chunk)
    const remainingChunks = textChunks.length - currentIndex;
    const estimatedSeconds = remainingChunks * 3;
    const minutes = Math.floor(estimatedSeconds / 60);
    const seconds = estimatedSeconds % 60;
    
    if (minutes > 0) {
        document.getElementById('timeRemaining').textContent = `~${minutes}m ${seconds}s remaining`;
    } else {
        document.getElementById('timeRemaining').textContent = `~${seconds}s remaining`;
    }
}

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
    progressBar.style.width = progress + '%';
    
    // Update reading info
    updateReadingInfo();
    
    statusDiv.innerHTML = `Reading segment ${currentIndex + 1} of ${textChunks.length}`;
    
    currentUtterance = new SpeechSynthesisUtterance(chunk);
    currentUtterance.rate = parseFloat(document.getElementById('speedControl').value);
    currentUtterance.pitch = 1.0;
    currentUtterance.volume = parseFloat(document.getElementById('volumeControl').value);
    // Set voice (try to use a good quality voice)
    const voices = speechSynthesis.getVoices();
    const preferredVoice = voices.find(voice => 
        voice.lang.includes('en') && voice.name.includes('Google') || 
        voice.name.includes('Microsoft') || 
        voice.name.includes('Samantha')
    );
    if (preferredVoice) {
        currentUtterance.voice = preferredVoice;
    }
    
    currentUtterance.onend = function() {
        currentIndex++;
        saveReadingProgress();
        
        if (isReading && currentIndex < textChunks.length) {
            setTimeout(readNextChunk, 500);
        } else if (currentIndex >= textChunks.length) {
            // Finished reading
            statusDiv.innerHTML = '<span class="text-success">Finished reading the book!</span>';
            localStorage.removeItem(`readingProgress_${bookId}`);
            stopReading();
        }
    };
    
    currentUtterance.onerror = function(event) {
        statusDiv.innerHTML = `<span class="text-danger">Error: ${event.error}</span>`;
        stopReading();
    };
    
    speechSynthesis.speak(currentUtterance);
}

function pauseReading() {
    if (speechSynthesis.speaking) {
        speechSynthesis.pause();
        document.getElementById('pauseAudioBtn').innerHTML = '<i class="fas fa-play me-2"></i>Resume';
        document.getElementById('resumeAudioBtn').style.display = 'block';
        document.getElementById('audioStatus').innerHTML = 'Reading paused';
        // Save progress when paused
        saveReadingProgress();
    } else if (speechSynthesis.paused) {
        speechSynthesis.resume();
        document.getElementById('pauseAudioBtn').innerHTML = '<i class="fas fa-pause me-2"></i>Pause';
        document.getElementById('resumeAudioBtn').style.display = 'none';
        document.getElementById('audioStatus').innerHTML = 'Reading resumed';
    }
}

function stopReading() {
    isReading = false;
    if (currentUtterance) {
        speechSynthesis.cancel();
        currentUtterance = null;
    }
 
    saveReadingProgress();
    
    document.getElementById('startAudioBtn').style.display = 'block';
    document.getElementById('resumeAudioBtn').style.display = 'none';
    document.getElementById('pauseAudioBtn').style.display = 'none';
    document.getElementById('stopAudioBtn').style.display = 'none';
    document.getElementById('audioInfo').style.display = 'none';
    document.getElementById('audioProgressBar').style.width = '0%';
    document.getElementById('audioStatus').innerHTML = 'Ready to read: {{ $book->title ?? "Book" }}';
}

// Handle page visibility change to pause audio when tab is not active
document.addEventListener('visibilitychange', function() {
    if (document.hidden && isReading) {
        pauseReading();
    }
});

speechSynthesis.onvoiceschanged = function() {
    // Voices are now available
    console.log('Speech synthesis voices loaded');
};

// Save reading progress to localStorage
function saveReadingProgress() {
    const progress = {
        bookId: bookId,
        currentIndex: currentIndex,
        totalChunks: textChunks.length,
        timestamp: Date.now()
    };
    localStorage.setItem(`readingProgress_${bookId}`, JSON.stringify(progress));
}


function loadReadingProgress() {
    const savedProgress = localStorage.getItem(`readingProgress_${bookId}`);
    if (savedProgress) {
        const progress = JSON.parse(savedProgress);
        // Check if the saved progress is from today (within 24 hours)
        const isRecent = (Date.now() - progress.timestamp) < (24 * 60 * 60 * 1000);
        
        if (isRecent && progress.totalChunks > 0) {
            currentIndex = progress.currentIndex;
            // Show resume button if there's saved progress
            document.getElementById('resumeAudioBtn').style.display = 'block';
            document.getElementById('startAudioBtn').style.display = 'none';
        }
    }
}

// Function to read from a specific page
function readFromPage(pageNumber) {
    console.log('Attempting to read from page:', pageNumber);
    console.log('Available page texts:', window.pageTexts);
    
    if (isReading) {
        stopReading();
    }
    
    // Check if we have stored text for this page
    if (window.pageTexts && window.pageTexts[pageNumber]) {
        const pageText = window.pageTexts[pageNumber];
        console.log('Using stored text for page', pageNumber, ':', pageText);
        
        if (pageText && pageText.trim().length > 0) {
            currentText = pageText;
            textChunks = splitTextIntoChunks(pageText, 150);
            currentIndex = 0;
            
            console.log('Created chunks for page', pageNumber, ':', textChunks);
            
            if (textChunks.length === 0) {
                document.getElementById('audioStatus').innerHTML = `<span class="text-warning">No readable content on page ${pageNumber}</span>`;
                return;
            }
       
            document.getElementById('audioStatus').innerHTML = `Reading page ${pageNumber} of ${totalPages}`;
            startReading();
            return;
        }
    }
    
  
    console.log('No stored text found, extracting from page', pageNumber);
    document.getElementById('audioStatus').innerHTML = `Extracting content from page ${pageNumber}...`;
    if (pdfDocument) {
        pdfDocument.getPage(pageNumber).then(async (page) => {
            try {
                const pageText = await extractTextWithMultipleMethods(page);
                
                if (pageText && pageText.trim().length > 0) {
                    // Store this page text
                    if (!window.pageTexts) window.pageTexts = {};
                    window.pageTexts[pageNumber] = pageText;
                    
                    // Set up reading for this specific page
                    currentText = pageText;
                    textChunks = splitTextIntoChunks(pageText, 150);
                    currentIndex = 0;
                    
                    console.log('Successfully extracted text from page', pageNumber, ':', pageText.substring(0, 150) + '...');
                    
                    // Update status and start reading
                    document.getElementById('audioStatus').innerHTML = `Reading page ${pageNumber} of ${totalPages}`;
                    startReading();
                    
                } else {
                    // Create fallback content
                    const fallbackText = `Page ${pageNumber} of ${bookTitle} by ${bookAuthor}. This page contains content that could not be extracted automatically.`;
                    window.pageTexts[pageNumber] = fallbackText;
                    
                    currentText = fallbackText;
                    textChunks = splitTextIntoChunks(fallbackText, 150);
                    currentIndex = 0;
                    
                    document.getElementById('audioStatus').innerHTML = `Reading page ${pageNumber} with fallback content`;
                    startReading();
                }
            } catch (error) {
                console.error(`Error extracting text from page ${pageNumber}:`, error);
                document.getElementById('audioStatus').innerHTML = `<span class="text-danger">Failed to extract content from page ${pageNumber}</span>`;
            }
        }).catch(error => {
            console.error(`Error getting page ${pageNumber}:`, error);
            document.getElementById('audioStatus').innerHTML = `<span class="text-danger">Error accessing page ${pageNumber}</span>`;
        });
    } else {
        document.getElementById('audioStatus').innerHTML = `<span class="text-warning">PDF not loaded. Please wait for initialization to complete.</span>`;
    }
}

//iframe content
function extractTextFromIframe() {
    try {
        const iframe = document.getElementById('pdfViewer');
        if (!iframe || !iframe.contentWindow) {
            console.log('Iframe not accessible');
            return null;
        }

     
        const pdfViewer = iframe.contentWindow.PDFViewerApplication;
        if (!pdfViewer) {
            console.log('PDF viewer application not found');
            return null;
        }

        const currentPage = pdfViewer.page || window.currentPageNumber || 1;
        console.log('Current page from iframe:', currentPage);

      
        if (pdfViewer.pages && pdfViewer.pages[currentPage - 1]) {
            const pageElement = pdfViewer.pages[currentPage - 1];
            
            // Look for text layer which contains the actual visible text
            const textLayer = pageElement.querySelector('.textLayer');
            if (textLayer) {
        
                const textElements = textLayer.querySelectorAll('div');
                if (textElements.length > 0) {
                    let extractedText = '';
               
                    for (let i = 0; i < textElements.length; i++) {
                        const element = textElements[i];
                        const text = element.textContent || element.innerText;
                        
                        if (text && text.trim().length > 0) {
                            if (i > 0) {
                                extractedText += ' ';
                            }
                            extractedText += text.trim();
                        }
                    }
                    
                    if (extractedText.trim().length > 0) {
                        console.log('Successfully extracted visible text from page:', extractedText.substring(0, 200) + '...');
                        return extractedText;
                    }
                }
            }
            
            const allTextElements = pageElement.querySelectorAll('*');
            let visibleTexts = [];
            
            for (let element of allTextElements) {
                const text = element.textContent || element.innerText;
                if (text && text.trim().length > 0 && 
                    element.offsetWidth > 0 && element.offsetHeight > 0) {
                    visibleTexts.push(text.trim());
                }
            }
            
            if (visibleTexts.length > 0) {
                const extractedText = visibleTexts.join(' ');
                console.log('Successfully extracted text from visible elements:', extractedText.substring(0, 200) + '...');
                return extractedText;
            }
        }

        console.log('No visible text found in iframe content');
        return null;
        
    } catch (error) {
        console.error('Error extracting text from iframe:', error);
        return null;
    }
}

function readCurrentPage() {
    console.log('readCurrentPage called');
    console.log('Current page number:', window.currentPageNumber);

    const iframeText = extractTextFromIframe();
    if (iframeText && iframeText.trim().length > 0) {
        console.log('Using iframe text for reading');
      
        if (!window.pageTexts) window.pageTexts = {};
        window.pageTexts[window.currentPageNumber] = iframeText;
     
        currentText = iframeText;
        textChunks = splitTextIntoChunks(iframeText, 150);
        currentIndex = 0;
        
        // Update status
        document.getElementById('audioStatus').innerHTML = `Reading page ${window.currentPageNumber} with real content`;
        
        // Start reading immediately
        startReading();
        return;
    }
    
    
    if (window.pageTexts && window.pageTexts[window.currentPageNumber]) {
        console.log('Reading from stored page text for page:', window.currentPageNumber);
        readFromPage(window.currentPageNumber);
    } else {
        console.log('No stored text found, trying to extract from current page...');
     
        extractTextFromCurrentVisiblePage();
    }
}

// Function to refresh the text content of the current page in the PDF viewer
async function refreshCurrentPageText() {
    const statusDiv = document.getElementById('audioStatus');
    statusDiv.innerHTML = 'Refreshing current page text with enhanced extraction...';

    try {
        
        if (pdfDocument && window.currentPageNumber) {
            const page = await pdfDocument.getPage(window.currentPageNumber);
        
            const pageText = await extractTextWithMultipleMethods(page);
            
            if (pageText && pageText.trim().length > 0) {
                if (!window.pageTexts) window.pageTexts = {};
                window.pageTexts[window.currentPageNumber] = pageText;

                console.log('Successfully refreshed text for current page:', pageText.substring(0, 150) + '...');
                statusDiv.innerHTML = `Page ${window.currentPageNumber} text refreshed successfully with enhanced extraction!`;

                setTimeout(() => {
                    statusDiv.innerHTML = `Ready to read page ${window.currentPageNumber} with real content`;
                }, 2000);

                return;
            } else {
                // Try basic extraction as fallback
                const basicText = await page.getTextContent();
                if (basicText && basicText.items && basicText.items.length > 0) {
                    const basicPageText = basicText.items.map(item => item.str).join(' ');
                    
                    if (basicPageText.trim().length > 0) {
                        if (!window.pageTexts) window.pageTexts = {};
                        window.pageTexts[window.currentPageNumber] = basicPageText;
                        
                        console.log('Basic text extraction successful for refresh:', basicPageText.substring(0, 150) + '...');
                        statusDiv.innerHTML = `Page ${window.currentPageNumber} basic text refreshed successfully!`;
                        
                        setTimeout(() => {
                            statusDiv.innerHTML = `Ready to read page ${window.currentPageNumber}`;
                        }, 2000);
                        return;
                    }
                }
            }
        }

        const fallbackText = `Page ${window.currentPageNumber} of ${bookTitle} by ${bookAuthor}. This page contains content that could not be extracted automatically.`;

        if (!window.pageTexts) window.pageTexts = {};
        window.pageTexts[window.currentPageNumber] = fallbackText;

        console.log('Created intelligent fallback text for current page');
        statusDiv.innerHTML = `Page ${window.currentPageNumber} fallback content created`;

    } catch (error) {
        console.error('Error refreshing current page text:', error);

        // Create a basic fallback
        const basicFallback = `Page ${window.currentPageNumber} of ${bookTitle} by ${bookAuthor}. This page contains the content you are currently viewing.`;

        if (!window.pageTexts) window.pageTexts = {};
        window.pageTexts[window.currentPageNumber] = basicFallback;

        statusDiv.innerHTML = 'Using fallback content for current page';
    }
}

async function extractTextFromCurrentVisiblePage() {
    const statusDiv = document.getElementById('audioStatus');
    statusDiv.innerHTML = 'Extracting text from current visible page...';
    
    try {
    
        if (pdfDocument && window.currentPageNumber) {
            const page = await pdfDocument.getPage(window.currentPageNumber);
                        const pageText = await extractTextWithMultipleMethods(page);
            
            if (pageText && pageText.trim().length > 0) {
                // Store this page text
                if (!window.pageTexts) window.pageTexts = {};
                window.pageTexts[window.currentPageNumber] = pageText;
                
                console.log('Successfully extracted text from current page:', pageText.substring(0, 150) + '...');
                statusDiv.innerHTML = `Successfully extracted text from page ${window.currentPageNumber}`;
                
                // Now read this page
                setTimeout(() => {
                    readFromPage(window.currentPageNumber);
                }, 1000);
                return;
            } else {
                
                const basicText = await page.getTextContent();
                if (basicText && basicText.items && basicText.items.length > 0) {
                    const basicPageText = basicText.items.map(item => item.str).join(' ');
                    
                    if (basicPageText.trim().length > 0) {
                        if (!window.pageTexts) window.pageTexts = {};
                        window.pageTexts[window.currentPageNumber] = basicPageText;
                        
                        console.log('Basic text extraction successful:', basicPageText.substring(0, 150) + '...');
                        statusDiv.innerHTML = `Basic text extracted from page ${window.currentPageNumber}`;
                        
                        setTimeout(() => {
                            readFromPage(window.currentPageNumber);
                        }, 1000);
                        return;
                    }
                }
            }
        }
        
        const fallbackText = `Page ${window.currentPageNumber} of ${bookTitle} by ${bookAuthor}. This page contains content that could not be automatically extracted. The page shows important information and text that is part of the book.`;
        
        if (!window.pageTexts) window.pageTexts = {};
        window.pageTexts[window.currentPageNumber] = fallbackText;
        
        console.log('Created intelligent fallback text for current page');
        statusDiv.innerHTML = `Using fallback content for page ${window.currentPageNumber}`;
       
        setTimeout(() => {
            readFromPage(window.currentPageNumber);
        }, 1000);
        
    } catch (error) {
        console.error('Error extracting text from current page:', error);
        
        // Create a basic fallback
        const basicFallback = `Page ${window.currentPageNumber} of ${bookTitle} by ${bookAuthor}. This page contains the content you are currently viewing.`;
        
        if (!window.pageTexts) window.pageTexts = {};
        window.pageTexts[window.currentPageNumber] = basicFallback;
        
        statusDiv.innerHTML = 'Using fallback content for current page';
      
        setTimeout(() => {
            readFromPage(window.currentPageNumber);
        }, 1000);
    }
}

async function forceReadCurrentPage() {
    console.log('Force reading current page:', window.currentPageNumber);
    
    // Clear any existing text
    currentText = '';
    textChunks = [];
    currentIndex = 0;
    
    // Stop any current reading
    if (speechSynthesis.speaking) {
        speechSynthesis.cancel();
    }
  
    document.getElementById('audioStatus').innerHTML = 'Extracting exact text from current page...';
    
    setTimeout(async () => {
        try {
            let extractedText = extractTextFromIframe();
            
            if (!extractedText || extractedText.trim().length === 0) {
                console.log('Iframe extraction failed, trying PDF.js...');
                
                if (window.pdfDocument && window.currentPageNumber) {
                    const page = await window.pdfDocument.getPage(window.currentPageNumber);
                    if (page) {
                        extractedText = await extractTextWithMultipleMethods(page);
                    }
                }
            }
            
            if (extractedText && extractedText.trim().length > 0) {
                if (!window.pageTexts) window.pageTexts = {};
                window.pageTexts[window.currentPageNumber] = extractedText;
                                currentText = extractedText;
                textChunks = splitTextIntoChunks(extractedText, 150);
                currentIndex = 0;
                
                console.log('Successfully extracted text for reading:', extractedText.substring(0, 200) + '...');
                console.log('Text chunks created:', textChunks.length);
                
                // Update status and start reading
                document.getElementById('audioStatus').innerHTML = `Reading page ${window.currentPageNumber} with ${textChunks.length} segments`;
                startReading();
                
            } else {
                // If all methods failed, show error
                document.getElementById('audioStatus').innerHTML = `Failed to extract text from page ${window.currentPageNumber}. Try refreshing the page.`;
                console.error('All text extraction methods failed');
            }
            
        } catch (error) {
            console.error('Error in force reading:', error);
            document.getElementById('audioStatus').innerHTML = `Error reading page ${window.currentPageNumber}: ${error.message}`;
        }
    }, 500);
}

// Function to go to a specific page
function goToSpecificPage() {
    const pageNumber = parseInt(document.getElementById('pageInput').value);
    if (pageNumber >= 1 && pageNumber <= totalPages) {
        console.log('Navigating to page:', pageNumber);
        
        // Stop any current reading
        if (isReading) {
            stopReading();
        }
        
        // Update current page number
        window.currentPageNumber = pageNumber;
        updatePageDisplay();
        
        // Navigate to the specific page in PDF viewer
        navigateToPage(pageNumber);
        
        // Clear the input
        document.getElementById('pageInput').value = '';
        
        // Update status
        document.getElementById('audioStatus').innerHTML = `Navigated to page ${pageNumber}. Extracting content...`;
        
        setTimeout(async () => {
            try {
                if (pdfDocument) {
                    const page = await pdfDocument.getPage(pageNumber);
                    const pageText = await extractTextWithMultipleMethods(page);
                    
                    if (pageText && pageText.trim().length > 0) {
                        if (!window.pageTexts) window.pageTexts = {};
                        window.pageTexts[pageNumber] = pageText;
                        currentText = pageText;
                        textChunks = splitTextIntoChunks(pageText, 150);
                        currentIndex = 0;
                        
                        console.log(`Successfully extracted text from page ${pageNumber}:`, pageText.substring(0, 150) + '...');
                        document.getElementById('audioStatus').innerHTML = `Reading page ${pageNumber} of ${totalPages}`;
                        startReading();
                        
                    } else {
                        if (window.pageTexts && window.pageTexts[pageNumber]) {
                            readFromPage(pageNumber);
                        } else {
                            // Create fallback content for this page
                            const fallbackText = `Page ${pageNumber} of ${bookTitle} by ${bookAuthor}. This page contains content that is part of the book.`;
                            window.pageTexts[pageNumber] = fallbackText;
                            
                            currentText = fallbackText;
                            textChunks = splitTextIntoChunks(fallbackText, 150);
                            currentIndex = 0;
                            
                            document.getElementById('audioStatus').innerHTML = `Reading page ${pageNumber} with fallback content`;
                            startReading();
                        }
                    }
                } else {
                    
                    if (window.pageTexts && window.pageTexts[pageNumber]) {
                        readFromPage(pageNumber);
                    } else {
                        document.getElementById('audioStatus').innerHTML = `<span class="text-warning">Page ${pageNumber} content not available. Try refreshing the page.</span>`;
                    }
                }
            } catch (error) {
                console.error(`Error reading page ${pageNumber}:`, error);
                document.getElementById('audioStatus').innerHTML = `<span class="text-danger">Error reading page ${pageNumber}: ${error.message}</span>`;
            }
        }, 1000);
        
    } else {
        alert('Please enter a valid page number (1 to ' + totalPages + ')');
    }
}

// Page navigation functions
function goToPreviousPage() {
    if (window.currentPageNumber > 1) {
        const newPage = window.currentPageNumber - 1;
        console.log('Navigating to previous page:', newPage);
        
        // Stop current reading if any
        if (isReading) {
            stopReading();
        }
        
        window.currentPageNumber = newPage;
        updatePageDisplay();
        navigateToPage(newPage);
        
        // Update status
        document.getElementById('audioStatus').innerHTML = `Navigated to page ${newPage}. Click "Read This Page" to start reading.`;
    }
}

function goToNextPage() {
    if (window.currentPageNumber < totalPages) {
        const newPage = window.currentPageNumber + 1;
        console.log('Navigating to next page:', newPage);
        
        // Stop current reading if any
        if (isReading) {
            stopReading();
        }
        
        window.currentPageNumber = newPage;
        updatePageDisplay();
        navigateToPage(newPage);
        
        // Update status
        document.getElementById('audioStatus').innerHTML = `Navigated to page ${newPage}. Click "Read This Page" to start reading.`;
    }
}

function updatePageDisplay() {
    const display = document.getElementById('currentPageDisplay');
    if (display) {
        display.textContent = `Page ${window.currentPageNumber} of ${totalPages || '?'}`;
    }
}

function navigateToPage(pageNumber) {
    try {
        const iframe = document.getElementById('pdfViewer');
        if (iframe && iframe.contentWindow) {
           
            if (iframe.contentWindow.PDFViewerApplication) {
                iframe.contentWindow.PDFViewerApplication.page = pageNumber;
            }
        }
    } catch (error) {
        console.error('Error navigating to page:', error);
    }
}

function readManualText() {
    const manualTextInput = document.getElementById('manualTextInput');
    const text = manualTextInput.value.trim();
    
    if (!text) {
        alert('Please enter some text to read.');
        return;
    }
    if (isReading) {
        stopReading();
    }

    currentText = '';
    textChunks = [];
    currentIndex = 0;

    // Set up reading for the manual text
    currentText = text;
    textChunks = splitTextIntoChunks(text, 150);
    currentIndex = 0;

    // Update status
    document.getElementById('audioStatus').innerHTML = `<span class="text-success">Reading from manual input: ${textChunks.length} segments</span>`;

    // Start reading
    startReading();
    
    // Clear the input after starting to read
    manualTextInput.value = '';
}

// Function to clear manual text input
function clearManualText() {
    document.getElementById('manualTextInput').value = '';
    document.getElementById('audioStatus').innerHTML = 'Ready to read: {{ $book->title ?? "Book" }}';
}

// Add keyboard shortcuts for manual text input
document.addEventListener('DOMContentLoaded', function() {
    const manualTextInput = document.getElementById('manualTextInput');
    if (manualTextInput) {
        // Enter key to start reading
        manualTextInput.addEventListener('keydown', function(event) {
            if (event.key === 'Enter' && !event.shiftKey) {
                event.preventDefault();
                readManualText();
            }
        });
        
        // Auto-clear when starting to type
        manualTextInput.addEventListener('input', function() {
            if (this.value.length === 1) {
                const statusDiv = document.getElementById('audioStatus');
                if (statusDiv.innerHTML.includes('Please enter some text')) {
                    statusDiv.innerHTML = 'Ready to read: {{ $book->title ?? "Book" }}';
                }
            }
        });
       
        manualTextInput.focus();
    }
});
</script>
@endsection