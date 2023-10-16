var script = document.createElement('script');
script.src = 'https://code.jquery.com/jquery-3.6.3.min.js'; // Check https://jquery.com/ for the current version
document.getElementsByTagName('head')[0].appendChild(script);



//admin panel sidebar scripting
const adminSidebar = document.getElementById("adminSidebar");
const hamBurgerBtn = document.getElementById("hamBurgerBtn");
const adminAppMain= document.getElementById("adminAppMain");
const sideBarHamBtn = document.getElementById("sideBarHamBtn");
const toggleAdminSidebar = () => {
    adminSidebar.classList.toggle("toggle");
    adminAppMain.classList.toggle("toggle");
}
hamBurgerBtn.addEventListener("click", () => toggleAdminSidebar());
sideBarHamBtn.addEventListener("click", () => toggleAdminSidebar());
//admin panel sidebar scripting end
    // Select all the li elements that are inside the ul elements with the sideBarUl class
    var liElements = $(".sideBarUl > li");

    // Add a click event handler to each li element
    liElements.click(function() {
        // Get the index of the clicked li element within its parent ul element
        var index = $(this).parent().children().index(this);
        // Store the index in localStorage with a key name "active"
        localStorage.setItem("active", index);
    });

    // When the page loads, check if there is any value stored in localStorage with the key name "active"
    $(document).ready(function() {
        // Get the value from localStorage
        var activeIndex = localStorage.getItem("active");
        // If there is a value, add active class to the corresponding li element
        if (activeIndex) {
            liElements.removeClass("active");
            liElements.eq(activeIndex).get(0).classList.add("active");
        }
    });




    // Get the table element by id
    var table = $("#admin-user-table");

    // Get the select all checkbox element by id
    var selectAll = $("#selectAll");

    // Get the delete all button element by id
    var deleteAll = $("#delete-selected-button");

    // Add a change event listener to the select all checkbox
    selectAll.change(function() {
        // Get the checked property of the select all checkbox
        var checked = selectAll.prop("checked");
        // Get all the checkboxes in the table rows
        var checkboxes = table.find("input[type='checkbox']");
        // Loop through the checkboxes and set their checked property to match the select all checkbox
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = checked;
        }
        // If the select all checkbox is checked, add the active class to the button
        // Otherwise, remove the active class from the button
        if (checked) {
            deleteAll.addClass("active");
        } else {
            deleteAll.removeClass("active");
        }
    });


    // Add a change event listener to the checkboxes in the table rows
    table.find("input[type='checkbox']").change(function() {
        // Get the number of checked checkboxes in the table
        var checkedCount = table.find("input[type='checkbox']:checked").length;
        // If there is at least one checked checkbox, add the active class to the button
        // Otherwise, remove the active class from the button
        if (checkedCount > 0) {
            deleteAll.addClass("active");
        } else {
            deleteAll.removeClass("active");
        }
    });


    // Get the delete button element by id

    var AddUserButton = $("#add-user-button");
    var NewUserSection = $("#new-user-section");
    var NewUserBox = $("#new-user-box");
    var CloseNewUserSection = $("#form-cancel-btn");

    AddUserButton.click(function() {
        NewUserSection.addClass("active");
        NewUserBox.addClass("active");
    });

    CloseNewUserSection.click(function() {
        NewUserSection.removeClass("active");
        NewUserBox.removeClass("active");
    });





    var flashMessage = document.getElementById("flash-message-content");

/* new user ajax code*/
    $(document).ready(function() {

        $('#newUserForm').submit(function(event) {

            event.preventDefault();
            // Prevent the form from submitting via the browser
            var formData = $(this).serialize(); // Get the form data
            $.ajax({
                url: '/admin/create', // The route to handle the request
                type: 'POST',
                data: formData,
                beforeSend: function() {

                },
                success: function(response) {
                    NewUserSection.removeClass("active");
                    NewUserBox.removeClass("active");
                    flashMessage.classList.add("active");
                    flashMessage.style.background = "lime";

                    // Display the success message
                    flashMessage.innerHTML = "User Created Successfully";

                    // Hide the flash message after 2 seconds
                    setTimeout(function() {
                        flashMessage.classList.remove("active");
                    }, 3000);

                    // Reload the page after 2 seconds
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                },
                error: function(response) {
                    // Handle the error here
                    if (response.status == 422) {
                        var errors = response.responseJSON.errors;
                        if (errors.fullName) {
                            $('#RepMsg1').fadeIn();

                            $('#RepMsg1').html(
                                '<i class="fa-solid fa-triangle-exclamation" style="color:red; font-size:11px;"></i> ' +
                                errors.fullName[0]
                            );
                            // $('#RepMsg').text(errors.fullName[0]);
                            // $('#errorIcon').html(errorMessage).css({
                            //     'color': 'blue',
                            //     'font-weight': 'bold',
                            //     'diplay': 'block'
                            // });



                        }
                        if (errors.username) {
                            $('#RepMsg1').fadeIn();

                            $('#RepMsg1').html(
                                '<i class="fa-solid fa-triangle-exclamation" style="color:red; font-size:11px;"></i> ' +
                                errors.username[0]
                            );

                            // $('#RepMsg').text(errors.email[0]);
                        }
                        if (errors.password) {
                            $('#RepMsg1').html(
                                '<i class="fa-solid fa-triangle-exclamation" style="color:red; font-size:11px;"></i> ' +
                                errors.password[0]
                            );

                            // $('#RepMsg').text(errors.password[0]);
                        }
                    } else {
                        // Handle other errors here
                    }
                }
            });
        });
    });




