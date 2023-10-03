<x-layout>

    <section class="createListing">
        <div class="formBox">
            <form method="POST" class="createForm" action="/listingscreate" enctype="multipart/form-data">
                @csrf
                <h1>Fill the Form to Add</h1>
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="Example: Teacher, Driver">
                @error('title')
                    <p style="font-size: 10px;color:red; ">{{ $message }}</p>
                @enderror
                <div class="inputDiv">
                    <label for="tags">Tags (Seperated with comma)</label>
                    <input type="text" name="tags" value="{{ old('tags') }}"
                        placeholder="Exaxmple: English, Car">
                    @error('tags')
                        <p style="font-size: 10px;color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="inputDiv">
                    <label for="companyName">Company Name</label>
                    <input type="text" name="companyName" value="{{ old('companyName') }}"
                        placeholder="Example: School Name">
                    @error('companyName')
                        <p style="font-size: 10px;color:red; ">{{ $message }}</p>
                    @enderror
                </div>
                <div class="inputDiv">
                    <label for="location">Location</label>
                    <input type="text" name="location" value="{{ old('location') }}"
                        placeholder="Example: Bharatpur-12">
                    @error('location')
                        <p style="font-size: 10px;color:red; ">{{ $message }}</p>
                    @enderror
                </div>
                <div class="inputDiv">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="{{ old('email') }}"
                        placeholder="Example: example@example.com">
                    @error('email')
                        <p style="font-size: 10px;color:red; ">{{ $message }}</p>
                    @enderror
                </div>
                <div class="inputDiv">
                    <label for="website">Website</label>
                    <input type="text" name="website" value="{{ old('website') }}"
                        placeholder="Example: www.example.com">
                    @error('website')
                        <p style="font-size: 10px;color:red; ">{{ $message }}</p>
                    @enderror
                </div>
                <div class="inputDiv">
                    <label for="website">Image</label>
                    <input type="file" name="logo" placeholder="">
                    @error('website')
                        <p style="font-size: 10px;color:red; ">{{ $message }}</p>
                    @enderror
                </div>
                <div class="inputDiv">

                    <label for="description">Description</label>
                    <textarea type="text" name="description" value="{{ old('description') }}" placeholder=""></textarea>

                    @error('description')
                        <p style="font-size: 10px;color:red; ">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit">Submit</button>

            </form>
        </div>
    </section>
</x-layout>
