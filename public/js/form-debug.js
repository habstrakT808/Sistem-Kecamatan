/**
 * Form Debug Helper
 * Digunakan untuk mendeteksi masalah pada form submit
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log('Form Debug Helper loaded');
    
    // Deteksi semua form pada halaman
    const forms = document.querySelectorAll('form');
    console.log(`Detected ${forms.length} forms on page`);
    
    forms.forEach((form, index) => {
        console.log(`Form #${index+1}:`, {
            action: form.action,
            method: form.method,
            enctype: form.enctype,
            elements: form.elements.length
        });
        
        // Tambahkan event listener untuk submit
        form.addEventListener('submit', function(e) {
            console.log(`Form #${index+1} submitted`);
            
            // Cek apakah ada validasi yang gagal
            const invalidFields = form.querySelectorAll(':invalid');
            if (invalidFields.length > 0) {
                console.log('Validation failed for fields:', invalidFields);
                // Tidak perlu e.preventDefault() karena browser akan menangani validasi
            } else {
                console.log('Form validation passed, continuing submission');
                // Uncomment baris berikut untuk mencegah submit dan melihat data form
                // e.preventDefault();
                // console.log('Form data:', new FormData(form));
            }
        });
        
        // Tambahkan event listener untuk semua tombol submit
        const submitButtons = form.querySelectorAll('button[type="submit"], input[type="submit"]');
        submitButtons.forEach((button, btnIndex) => {
            console.log(`Submit button #${btnIndex+1} in form #${index+1}:`, button);
            
            button.addEventListener('click', function(e) {
                console.log(`Submit button #${btnIndex+1} in form #${index+1} clicked`);
            });
        });
    });
});