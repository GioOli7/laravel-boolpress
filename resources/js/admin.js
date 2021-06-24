require("./bootstrap");

// console.log("ADMIN PAGE");

/**
 * delete post confirm
 *
 */

const delForm = document.querySelectorAll(".delete-post-form");

delForm.forEach(form => {
    form.addEventListener("submit", function(e) {
        const resp = confirm("Are you sure you want to delete this post?");

        if (!resp) {
            e.preventDefault();
        }
    });
});
