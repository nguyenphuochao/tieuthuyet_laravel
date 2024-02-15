<!-- Script to handle page transition chapter list tab2 -->
document.addEventListener('DOMContentLoaded', function () {
    // Check if there are active tabs saved in local storage
    let activeTab = localStorage.getItem('activeTab');

    // There is an active tab
    if (activeTab) {
        let tab = document.querySelector(activeTab);
        if (tab) {
            tab.click();
        }
    }

    // Listen for events when clicking on tabs
    let tabs = document.querySelectorAll('.nav-link');
    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            // Save the active tab to local storage
            localStorage.setItem('activeTab', '#' + this.id);
        });
    });
    
    //Count Char Comment
    var textarea = document.getElementById('noi_dung');
    var counter = document.getElementById('charCount');

    function updateCharCount() {
        var count = textarea.value.length;

        if (count <= 15 || count > 500) {
            counter.style.color = 'red';
        } else {
            counter.style.color = 'green';
        }

        counter.innerText = count;
    }

        textarea.addEventListener('input', updateCharCount);

        updateCharCount();
});
