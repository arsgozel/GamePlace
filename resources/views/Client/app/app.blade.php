<div>
    <img src="{{  $app->image ? Storage::url('apps/sm/' . $app->image) : asset('img/sm/app.jpg') }}"
         alt="{{ $app->getName() }}" class="img-fluid rounded-5" style="max-height: 11rem">
    <div class="mt-2 fw-semibold small">{{$app->getName()}}/
        <span class="small">
            @for($i = 0; $i < $app->rating; ++$i)
                <i class="bi-star-fill text-warning small"></i>
            @endfor
        </span>
    </div>

</div>

