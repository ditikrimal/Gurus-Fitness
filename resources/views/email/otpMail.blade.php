<x-emailLayout>
    <p>Dear <strong>
            {{ $name }}</strong>,
    </p>
    <p>Your OTP for verification is:</p>
    <p style="font-size: 36px; font-weight: bold; text-align: center; letter-spacing:8px">
        {{ $otp }}
    </p>
    <p>This OTP is valid for 24 hours.</p>

</x-emailLayout>
