<x-layout>

    <section class="createListing">
        <div class="formBox">
            <form method="POST" class="createForm" action="/listings/{{ $listing->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h1>Edit the Listing</h1>
                @if ($errors->any())
                    <h1 style="marging-top:-100px;font-size: 16px;color:red; tex-align:center;">Invalid</h1>
                @endif
                <label for="title">Title</label>

                <input type="text" name="title" value="{{ $listing->title }}">
                @error('title')
                @enderror
                <div class="inputDiv">
                    <label for="tags">Tags (Seperated with comma)</label>
                    <input type="text" name="tags" value="{{ $listing->tags }}">
                    @error('tags')
                        <p style="font-size: 10px;color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="inputDiv">
                    <label for="companyName">Company Name</label>
                    <input type="text" name="companyName" value="{{ $listing->companyName }}">
                    @error('companyName')
                        <p style="font-size: 10px;color:red; ">{{ $message }}</p>
                    @enderror
                </div>
                <div class="inputDiv">
                    <label for="location">Location</label>
                    <input type="text" name="location" value="{{ $listing->location }}">
                    @error('location')
                        <p style="font-size: 10px;color:red; ">{{ $message }}</p>
                    @enderror
                </div>
                <div class="inputDiv">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="{{ $listing->email }}">
                    @error('email')
                        <p style="font-size: 10px;color:red; ">{{ $message }}</p>
                    @enderror
                </div>
                <div class="inputDiv">
                    <label for="website">Website</label>
                    <input type="text" name="website" value="{{ $listing->website }}">
                    @error('website')
                        <p style="font-size: 10px;color:red; ">{{ $message }}</p>
                    @enderror
                </div>
                <div class="inputDiv">
                    <label for="website">Image</label>
                    <input type="file" name="logo">
                    <div class="listImg">
                        <img class="listImg"
                            src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/NoImage.jpg') }}"
                            alt="" />
                    </div>
                    @error('website')
                        <p style="font-size: 10px;color:red; ">{{ $message }}</p>
                    @enderror
                </div>
                <div class="inputDiv">

                    <label for="description">Description</label>
                    <textarea type="text" name="description">{{ $listing->description }}</textarea>
                    @error('description')
                        <p style="font-size: 10px;color:red; ">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit">Update</button>
                <a href="/listings" class="">Cancel</a>

            </form>
        </div>
    </section>
</x-layout>
