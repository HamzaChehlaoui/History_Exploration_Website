document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.delete-comment-form').forEach(function(form) {

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to undo this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33', // Red confirm button
                cancelButtonColor: '#3085d6', // Blue cancel button
                confirmButtonText: 'Yes, delete the comment!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});

    function toggleEditComment(commentId) {

        let contentElement = document.getElementById(`comment-content-${commentId}`);
        let formElement = document.getElementById(`comment-edit-form-${commentId}`);

        if (contentElement.classList.contains('hidden')) {
            contentElement.classList.remove('hidden');
            formElement.classList.add('hidden');
        } else {

            contentElement.classList.add('hidden');
            formElement.classList.remove('hidden');
        }
    }
