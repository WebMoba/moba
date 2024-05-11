<ul class="breadcrumbs">
    @foreach ($breadcrumbs as $breadcrumb)
        <li style="margin-bottom: -0.6vw;"><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a></li>
    @endforeach
</ul>

