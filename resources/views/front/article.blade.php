<section class="s-content @if(currentRoute('home')) s-content--no-top-padding @endif">


    <!-- masonry ================================================== -->
    <div class="s-bricks">

        <div class="masonry">
            <div class="bricks-wrapper h-group">

                <div class="grid-sizer"></div>

                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                @foreach ($images as $image)

                <article class="brick entry" data-aos="fade-up">

                    <div class="entry__thumb">
                        <a href="{{ route('acceuils.index') }}" class="thumb-link " style="height:24rem;">
                            <img class="img-thumbnail" src="{{ asset('/storage/'.$image->path) }}" alt="">
                        </a>
                    </div> <!-- end entry__thumb -->

                    <div class="entry__text">
                        <div class="entry__header">
                            <h1 class="entry__title text-primary"><a href="{{ route('acceuils.index') }}">{{ $image->evenement->nom }}</a></h1>

                            <div class="entry__meta text-primary">
                                <span class="byline">Par:
                                    <span class='author'>
                                        <a href="{{ route('acceuils.index') }}">{{$image->evenement->organisateur->nom}}</a>
                                </span>
                            </span>
                            </div>
                        </div>
                        <div class="entry__excerpt">
                            <p>
                                {{ $image->evenement->description }}
                            </p>
                        </div>
                        <a class="entry__more-link" href="{{route('acceuils.index')}}">Voir Plus</a>
                    </div> <!-- end entry__text -->

                </article> <!-- end article -->
                @endforeach

            </div> <!-- end brick-wrapper -->

        </div> <!-- end masonry -->

        <div class="row">
            <div class="column large-12">
                {{ $images->links('front.pagination') }}
            </div>
        </div> <!-- end row -->

    </div> <!-- end s-bricks -->

</section>
