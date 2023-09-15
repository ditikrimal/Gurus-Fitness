<x-emailLayout>
    <p>Dear <strong>
            {{ $name }}
        </strong>,
    </p>
    <p>Please click the verify button below to verify your account:</p>
    <tr>
        <td style="text-align: center;padding-bottom: 20px; padding-top:5px">
            <a href='http://webproject.test/email/verify/link/{{ $otp }}'
                style="font-size: 22px; font-weight: 500; text-align: center; padding: 8px 20px 6px 20px; background-color
        :grey;margin:10px; color:white;border-radius:10px;letter-spacing:2p;text-decoration:none;">
                VERIFY
            </a>
        </td>
    </tr>

</x-emailLayout>
