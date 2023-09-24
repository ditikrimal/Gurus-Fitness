@if (session()->has('createMessage') && session()->has('messageColor'))
    <div class="alertBox" style="background-color:   {{ session()->get('messageColor') }}" x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 2000)" x-show="show">
        {{ session()->get('createMessage') }}
    </div>
@endif
