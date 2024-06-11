        document.addEventListener("DOMContentLoaded", function() {
    const sidebarLinks = document.querySelectorAll(".sidebar ul li a");
    const pages = document.querySelectorAll(".page");

    sidebarLinks.forEach(function(link) {
        link.addEventListener("click", function(event) {
            event.preventDefault();
            const targetPageId = this.getAttribute("href").substring(1);
            showPage(targetPageId);
        });
    });

    function showPage(pageId) {
        pages.forEach(function(page) {
            if (page.id === pageId) {
                page.classList.add("active");
            } else {
                page.classList.remove("active");
            }
        });
    }
});

document.addEventListener("DOMContentLoaded", function() {
    const editCompanyBtn = document.getElementById("edit-company-btn");
    const editCompanyForm = document.getElementById("edit-company-form");

    editCompanyBtn.addEventListener("click", function() {
        editCompanyForm.style.display = "block";
        editCompanyBtn.style.display = "none";
    });

    const companyForm = document.getElementById("company-form");
    companyForm.addEventListener("submit", function(event) {
        event.preventDefault();
        const formData = new FormData(companyForm);
        const companyName = formData.get("cname");
        const companyAddress = formData.get("caddress");
        const companyEmail = formData.get("cemail");
        const companyPhone = formData.get("cphone");

        // Update company details display
        document.getElementById("company-name").innerText = companyName;
        document.getElementById("company-address").innerText = companyAddress;
        document.getElementById("company-email").innerText = companyEmail;
        document.getElementById("company-phone").innerText = companyPhone;

        // Hide edit form
        editCompanyForm.style.display = "none";
        editCompanyBtn.style.display = "block";
    });
});
