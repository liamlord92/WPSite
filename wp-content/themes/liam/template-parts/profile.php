<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>
    fetch('/blaize/account')
    .then(res => res.json())
    .then(
        (result) => {
            let identifiers = result['identifiers'];
            let email = identifiers['email_address'];
            $('.profile-title').append('<p>Email: ' + email + '</p>');
        }
    )

    fetch('/blaize/profile')
    .then(res => res.json())
    .then(
        (result) => {
            let name = result['first-name'];
            if(name){
                $('.profile-title').append('<p>Name: ' + name + '</p>');
            }else{
                document.getElementById('name-update').classList.remove('hidden');
            }
        }
    )
</script>

<div class="profile-info">
    <h1 class="profile-title">My Profile</h1>
    <form id="name-update" class="update hidden">
        <label for="firstName" class="mt-2"> First Name:</label>
        <input type="text" id="firstName" />

        <label for="surname" class="mt-2"> Surname:</label>
        <input type="text" id="surname" />

        <input type="submit" id="onSubmit" value="Submit">
        <div id="alert" role="alert"></div>
    </form>
</div>

<script>
    document.getElementById('onSubmit').onclick = function(e){ 

        var data = {
            "first-name": $('#firstName').val(),
            "last-name": $('#surname').val(),
        }

        // Stop the form default behaviour
        e.preventDefault();

        var jsondata = JSON.stringify(data);

        $.ajax({
            url: '/blaize/profile',
            type: 'POST',
            headers: {
                "Content-Type": "application/json"
            },
            data: jsondata,
            success: [
                function (response) {
                    console.log( response );
                    $('#alert').html(response);
                    location.reload(true);
                },
            ],
            error: [
                function (response) {
                    console.log( response );
                    $('#alert').html(response);
                },
            ],
        });
    };
</script>