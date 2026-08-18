<ul class="nav flex-column">
  {{-- {{ Auth::user()->name }} --}}
  @if (Auth::user()->name == 'Walidata')
    <li class="nav-item bg-link">
      <a class="nav-link my-1 p-0" href="{{ url('renstra/jelajah') }}">Beranda</a>
    </li>
    <li class="nav-item bg-link">
      <a class="nav-link my-1 p-0" href="{{ route('walidata.tarkin') }}">Target Kinerja</a>
    </li>
    <li class="nav-item bg-link">
      <a class="nav-link my-1 p-0" href="{{ route('walidata.tarang') }}">Target Keuangan</a>
    </li>
    <li class="nav-item bg-link">
      <a href="{{ route('walidata.form-sk') }}" class="nav-link my-1 p-0">Sub Kegiatan Baru</a>
    </li>
  @endif
</ul>