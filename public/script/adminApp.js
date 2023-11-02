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


//side links background color change
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

    // Assuming you have a variable to reference the "Delete Selected" button and the checkboxes
var deleteAll = document.getElementById("delete-selected-button");
var checkboxes = document.querySelectorAll(".select"); // Use a class selector

checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener("change", function() {
        // Check if any checkbox is checked
        var anyCheckboxChecked = Array.from(checkboxes).some(function(cb) {
            return cb.checked;
        });

        // Enable or disable the "Delete Selected" button based on whether any checkbox is checked
        if (anyCheckboxChecked) {
            deleteAll.classList.add("active");
        } else {
            deleteAll.classList.remove("active");
        }
    });
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

    // User Section PopUp
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

    // News Section PopUp
    var AddNewsButton = $("#add-news-button");
    var NewNewsSection = $("#new-news-section");
    var NewNewsBox = $("#new-news-box");
    var CloseNewNewsSection = $("#news-form-cancel-btn");

    AddNewsButton.click(function() {
        NewNewsSection.addClass("active");
        NewNewsBox.addClass("active");
    });

    CloseNewNewsSection.click(function() {
        NewNewsSection.removeClass("active");
        NewNewsBox.removeClass("active");
    });

    // Event Section PopUp
    var AddEventButton = $("#add-event-button");
    var NewEventSection = $("#new-event-section");
    var NewEventBox = $("#new-event-box");
    var CloseEventSection=$("#event-form-cancel-btn");

    AddEventButton.click(function() {
        NewEventSection.addClass("active");
        NewEventBox.addClass("active");
        });

    CloseEventSection.click(function() {
    NewEventSection.removeClass("active");
    NewEventBox.removeClass("active");
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
/* new user ajax code end*/

/* create news ajax code*/
$(document).ready(function() {

    $('#newNewsForm').submit(function(event) {

        event.preventDefault();
        // Prevent the form from submitting via the browser
        var formData = new FormData(document.getElementById('newNewsForm'));
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

        $.ajax({
            url: '/admin/news-and-events/create-news', // The route to handle the request
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
            },
            success: function() {
                NewUserSection.removeClass("active");
                NewUserBox.removeClass("active");
                flashMessage.classList.add("active");
                flashMessage.style.background = "lime";

                // Display the success message
                flashMessage.innerHTML = "News Added Successfully";

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
                    if (errors.news_title) {
                        $('#RepMsg1').fadeIn();

                        $('#RepMsg1').html(
                            '<i class="fa-solid fa-triangle-exclamation" style="color:red; font-size:11px;"></i> ' +
                            errors.news_title[0]
                        );
                        // $('#RepMsg').text(errors.fullName[0]);
                        // $('#errorIcon').html(errorMessage).css({
                        //     'color': 'blue',
                        //     'font-weight': 'bold',
                        //     'diplay': 'block'
                        // });
                    }
                    if (errors.news_title) {
                        $('#RepMsg1').fadeIn();

                        $('#RepMsg1').html(
                            '<i class="fa-solid fa-triangle-exclamation" style="color:red; font-size:11px;"></i> ' +
                            errors.news_body[0]
                        );

                        // $('#RepMsg').text(errors.email[0]);
                    }
                    if (errors.news_image) {
                        $('#RepMsg1').html(
                            '<i class="fa-solid fa-triangle-exclamation" style="color:red; font-size:11px;"></i> ' +
                            errors.news_image[0]
                        );

                        // $('#RepMsg').text(errors.password[0]);
                    }

                }
                else {
                }
            }
        });
    }
    );
});


/* create news ajax code end*/

/* create event ajax code*/

$(document).ready(function() {

    $('#newEventForm').submit(function(event) {

        event.preventDefault();
        // Prevent the form from submitting via the browser
        var formData = new FormData(document.getElementById('newEventForm'));
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

        $.ajax({
            url: '/admin/news-and-events/create-event', // The route to handle the request
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
            },
            success: function() {
                NewUserSection.removeClass("active");
                NewUserBox.removeClass("active");
                flashMessage.classList.add("active");
                flashMessage.style.background = "lime";

                // Display the success message
                flashMessage.innerHTML = "Event Added Successfully";

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
                    if (errors.events_title) {

                        $('#RepMsg2').fadeIn();

                        $('#RepMsg2').html(
                            '<i class="fa-solid fa-triangle-exclamation" style="color:red; font-size:11px;"></i> ' +
                            errors.events_title[0]
                        );
                        // $('#RepMsg').text(errors.fullName[0]);
                        // $('#errorIcon').html(errorMessage).css({
                        //     'color': 'blue',
                        //     'font-weight': 'bold',
                        //     'diplay': 'block'
                        // });
                    }
                    if (errors.events_body) {
                        $('#RepMsg2').fadeIn();

                        $('#RepMsg2').html(
                            '<i class="fa-solid fa-triangle-exclamation" style="color:red; font-size:11px;"></i> ' +
                            errors.events_body[0]
                        );

                        // $('#RepMsg').text(errors.email[0]);
                    }


                }
                else {
                }
            }
        });
    }
    );
});

//deleting records
function deleteSelectedRecords(route) {

        // Get the CSRF token from the hidden input field
        var token = document.getElementById("token").value;

        // Get all the checkboxes in the table rows
        var checkboxes = document.querySelectorAll("input[name='record']");

        // Create an empty array to store the ids of checked checkboxes
        var ids = [];

        // Loop through the checkboxes and check if they are checked
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                // Get the id from the data-id attribute and push it to the array
                var id = checkboxes[i].getAttribute("data-id");
                ids.push(id);
            }
        }

        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Open a DELETE request to the provided route
        xhr.open("delete", route);

        // Set the request header with the CSRF token and content type
        xhr.setRequestHeader("X-CSRF-TOKEN", token);
        xhr.setRequestHeader("Content-Type", "application/json");

        // Send the request with the JSON stringified array of ids as data
        xhr.send(JSON.stringify({
            ids: ids
        }));

        // Handle the response
        xhr.onload = function() {
            if (xhr.status == 200) {
                // Parse the JSON response
                var response = JSON.parse(xhr.responseText);
                console.log(response);

                flashMessage.classList.add("active");
                flashMessage.style.background = "lime";

                // Display the success message
                flashMessage.innerHTML = response.message;

                // Hide the flash message after 2 seconds
                setTimeout(function() {
                    flashMessage.classList.remove("active");
                }, 3000);

                // Reload the page after 2 seconds
                setTimeout(function() {
                    location.reload();
                }, 2000);
            } else {
                flashMessage.classList.add("active");
                // Display the success message
                flashMessage.innerHTML = "Something went wrong. Please try again.";
                flashMessage.style.background = "crimson";

                // Hide the flash message after 2 seconds
                setTimeout(function() {
                    flashMessage.classList.remove("active");
                }, 3000);

                // Reload the page after 2 seconds
                setTimeout(function() {
                    location.reload();
                }, 2000);
            }
        };
    }




