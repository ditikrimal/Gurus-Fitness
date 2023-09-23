
@php
    use App\Models\UserInfo;
    $email = Auth::user()->email;
    $userInfo = UserInfo::where('email', $email)->first();
    if ($userInfo !== null) {
    if ($userInfo->address == null || $userInfo->city==null ||$userInfo->country==null|| $userInfo->phone==null) {
        @endphp
<div class="infoFieldAlert"> <a style="color:white;" href="/user/profile"><i class="fa-solid fa-exclamation" style="margin-right:10px;""></i> Click to complete your profile</a></div>
        @php
        
    }
    }
    @endphp

