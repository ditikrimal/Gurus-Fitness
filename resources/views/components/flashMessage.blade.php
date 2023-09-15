@if (session()->has('createMessage') && session()->has('messageColor'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" class="alertBox"
        style="background-color:   {{ session()->get('messageColor') }}">

        {{ session()->get('createMessage') }}
    </div>
@endif
