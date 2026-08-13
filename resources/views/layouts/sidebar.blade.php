<ul class="nav flex-column">
  <li class="nav-item bg-link">
    <a class="nav-link my-1 p-0" href="{{ url('renstra/jelajah') }}">Renstra</a>
  </li>
  <li class="nav-item bg-link">
    <a class="nav-link my-1 p-0" href="{{ route('rensi.index') }}">Rencana Aksi</a>
  </li>
  <li class="nav-item bg-link">
    {{-- <a class="nav-link my-1 p-0" href="{{ url('edit/analisa/00-00-00-00-00-00') }}">Pengukuran Kinerja</a> --}}
    <a href="{{ url('rensi/ukur-kinerja/00-00-00-00-00-00') }}" class="nav-link my-1 p-0">Pengukuran Kinerja</a>
  </li>
  <li class="nav-item bg-link">
    <a class="nav-link my-1 p-0" aria-disabled="true">I K U</a>
  </li>
  {{-- {{ Auth::user()->name }} --}}
  @if (Auth::user()->name == 'Walidata')
    <li class="nav-item bg-link">
    <a class="nav-link my-1 p-0" href="{{ route('walidata.index') }}">Administrator</a>
  </li>
  @endif
</ul>