@extends('welcome')

@section('body')
<div id="map" style="width: 100%; height: 100vh;">
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">投稿一覧</div>

        <div class="card-body">
          <button type="button" class="btn btn-primary mb-3 d-block w-100" onclick="onCreateButtonClick()">
            新規投稿
          </button>
          <div class="table-resopnsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>タイトル</th>
                  <th>本文</th>
                  <th>状態</th>
                </tr>
              </thead>
              <tbody>
                @if(isset($posts))
                @foreach ($posts as $post)
                <tr>
                  <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                  <td>{{ $post->body }}</td>
                  <td>{{ $post->status }}</td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  (g => {
    var h, a, k, p = "The Google Maps JavaScript API",
      c = "google",
      l = "importLibrary",
      q = "__ib__",
      m = document,
      b = window;
    b = b[c] || (b[c] = {});
    var d = b.maps || (b.maps = {}),
      r = new Set,
      e = new URLSearchParams,
      u = () => h || (h = new Promise(async (f, n) => {
        await (a = m.createElement("script"));
        e.set("libraries", [...r] + "");
        for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
        e.set("callback", c + ".maps." + q);
        a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
        d[q] = f;
        a.onerror = () => h = n(Error(p + " could not load."));
        a.nonce = m.querySelector("script[nonce]")?.nonce || "";
        m.head.append(a)
      }));
    d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
  })({
    key: "AIzaSyBQj_1Rn5wlTqLtU3T78EWc5Ty0aZzawvs",
    // Add other bootstrap parameters as needed, using camel case.
    // Use the 'v' parameter to indicate the version to load (alpha, beta, weekly, etc.)
  });
</script>

<script src="{{ asset('/js/post.js') }}"></script>
@endsection
