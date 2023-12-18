$(document).ready(function(){
    console.log("coupon js");

    $('#sampleTable').DataTable();
    $('#deleteCouponsAllBtn').on('click', function () {
        console.log("meta",$('meta[name="csrf-token"]').attr('content'));
        // Show confirmation modal or use a library like SweetAlert
        if (confirm('Are you sure you want to delete all records?')) {
            // Make AJAX request to delete records
            $.ajax({
                type: 'post',
                url: 'coupon/delete-all',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                  window.location.reload();
                    // Optionally, reload the page or update the UI
                },
                error: function (error) {
                    console.error('Error deleting records:', error);
                }
            });
        }
    });
});