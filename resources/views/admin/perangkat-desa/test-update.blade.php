<!DOCTYPE html>
<html>
<head>
    <title>Test Update Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Test Update Form</h1>
    
    <form id="test-form" action="{{ route('admin.perangkat-desa.update', 1) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label for="update_reason">Update Reason:</label>
            <input type="text" name="update_reason" value="Test update" required>
        </div>
        
        <div>
            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" name="nama_lengkap" value="Test Name" required>
        </div>
        
        <div>
            <label for="jabatan">Jabatan:</label>
            <input type="text" name="jabatan" value="Test Position" required>
        </div>
        
        <button type="submit" id="submit-btn">Submit</button>
    </form>
    
    <div id="result"></div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('test-form');
        const resultDiv = document.getElementById('result');
        const submitBtn = document.getElementById('submit-btn');
        
        // Log form details
        console.log('Form action:', form.action);
        console.log('Form method:', form.method);
        
        // Add event listener to form submit
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            console.log('Form submitted');
            resultDiv.innerHTML = '<p>Form submitted</p>';
            
            // Create FormData object
            const formData = new FormData(form);
            
            // Log form data
            for (const pair of formData.entries()) {
                console.log(pair[0] + ': ' + pair[1]);
            }
            
            // Send form data using fetch
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                console.log('Response status:', response.status);
                return response.text();
            })
            .then(data => {
                console.log('Response data:', data);
                resultDiv.innerHTML += '<p>Response received</p>';
            })
            .catch(error => {
                console.error('Error:', error);
                resultDiv.innerHTML += '<p>Error: ' + error.message + '</p>';
            });
        });
        
        // Add event listener to submit button
        submitBtn.addEventListener('click', function(e) {
            console.log('Submit button clicked');
        });
    });
    </script>
</body>
</html>