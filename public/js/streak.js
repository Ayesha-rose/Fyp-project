document.addEventListener("DOMContentLoaded", function() {
    const showMoreBtn = document.getElementById("showMoreBtn");
    if(showMoreBtn){
        showMoreBtn.addEventListener("click", function() {
            const hiddenItems = document.querySelectorAll("#streakHistoryList .streak-item.d-none");
            if(hiddenItems.length > 0){
                hiddenItems.forEach(item => item.classList.remove("d-none"));
                this.textContent = "Show Less"; // toggle button hy 
            } else {
                document.querySelectorAll("#streakHistoryList .streak-item")
                    .forEach((item, index) => {
                        if(index >= 3) item.classList.add("d-none");
                    });
                this.textContent = "Show More";
            }
        });
    }
});
