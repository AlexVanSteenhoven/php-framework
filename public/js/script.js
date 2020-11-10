// Handle go back function on 404 error page
function goBack() {
    window.history.back();
}

// Enable flash messages to fade in
setTimeout(function () {
    $('.alert').alert('close');
}, 3000);