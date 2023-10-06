<x-layout>
    <section class="listing">
        <h1 style="text-align: center">{{ $news->news_title }}</h1>


        <div class="listBox">
            <div class="boxContent">
                <div class="row">


                </div>
                <div class="tags">


                </div>


                <div class="description">
                    <p>
                        {{ $news->news_body }}
                    </p>
                </div>
            </div>
        </div>


    </section>
</x-layout>
