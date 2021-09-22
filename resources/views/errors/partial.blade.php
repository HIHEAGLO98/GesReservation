<h1>{{ __('errors.error-' . $number) }}</h1>
<p class="lead">{{ __('errors.error-' . $number . '-info') }}</p>
@if($number != '503')
    <p class="lead">
        <a href="{{ url('/') }}" class="btn btn--primary">{{ __('Home') }}</a>
    </p>
@endif
