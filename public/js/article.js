document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.delete-comment-form').forEach(function(form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to undo this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete the comment!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    const deleteArticleBtn = document.getElementById('delete-article-btn');
    const deleteArticleForm = document.getElementById('delete-article-form');

    if (deleteArticleBtn && deleteArticleForm) {
        deleteArticleBtn.addEventListener('click', function () {
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteArticleForm.submit();
                }
            });
        });
    }

    window.toggleEditComment = function(commentId) {
        let contentElement = document.getElementById(`comment-content-${commentId}`);
        let formElement = document.getElementById(`comment-edit-form-${commentId}`);

        if (contentElement && formElement) {
            contentElement.classList.toggle('hidden');
            formElement.classList.toggle('hidden');
        }
    }

});
