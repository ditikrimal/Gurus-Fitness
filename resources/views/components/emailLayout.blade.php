<!DOCTYPE html>
<html>

<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
    <script src="https://kit.fontawesome.com/eac1eb5eeb.js"></script>

</head>

<body style="font-family: Arial, sans-serif; font-size: 17px; line-height: 1.5; color: #333333; ">
    <table style="width: 100%; max-width: 600px; margin: 0 auto;border-radius:20px;">
        <tr>
            <td style=" text-align: center;padding-top:20px">
                <span style="font-size:35px; font-weight:600; text-transform: uppercase">Gurus <span
                        style="color: #007bff;">Fitness</span></span>
            </td>
        </tr>
        <hr style="height: 0.8px; background-color:black">
        <tr>
            <td style="padding: 0px 20px;">
                {{ $slot }}

            </td>
        </tr>
        <tr style="display: flex; background-color:rgb(54, 54, 54); font-weight:500;color:white;border-radius:20px">
            <th>
            <td style="padding: 10px 20px; ">
                <p>Thank you for using our service.</p>
                <p>Best regards,<br> Gurus <span style="color: #007bff;">Fitness</span></p>
            </td>
            </th>
            <th>
            <td style="padding: 28px 20px; ">
                <span>Contact Us:</span>
                <br>
                <span style="text-decoration:none; color: #ffa513"> <i class="fa-brands fa-google"
                        style="font-size: 12px;margin-right:5px;">
                    </i>example@gmail.com</span>
                <br>
                <span style="color: #87ceeb"><i class="fa-solid fa-phone" style="font-size: 12px;margin-right:5px;">
                    </i>+977 9988776655</span>
            </td>
            </th>
        </tr>
        <tr style="text-align: center">
            <td>
                <hr style="height: 0.8px; background-color:black;">
                <p>
                    Copyright © 2023 Gurus of Fitness.
                </p>
                <hr style="height: 0.7px; background-color:black;">

            </td>
        </tr>
    </table>
</body>

</html>
