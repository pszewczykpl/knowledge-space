<div class="card card-custom">
    <div class="card-body px-5">
        <div class="navi navi-hover navi-active navi-link-rounded navi-bold navi-icon-center">
            <div class="navi-item my-2">
                <a href="{{ route('trash.index', 'investments') }}" class="navi-link {{ (request()->route('model') == 'investments') ? 'active' : '' }}">
                    <span class="navi-icon mr-4">
                        @include('svg.investment', ['class' => 'svg-icon-lg'])
                    </span>
                    <span class="navi-text font-weight-bold font-size-lg">Ubezpieczenia Inwestycyjne</span>
                </a>
            </div>
            <div class="navi-item my-2">
                <a href="{{ route('trash.index', ['model' => 'protectives']) }}" class="navi-link {{ (request()->route('model') == 'protectives') ? 'active' : '' }}">
                    <span class="navi-icon mr-4">
                        @include('svg.protective', ['class' => 'svg-icon-lg'])
                    </span>
                    <span class="navi-text font-weight-bold font-size-lg">Ubezpieczenia Ochronne</span>
                </a>
            </div>
            <div class="navi-item my-2">
                <a href="{{ route('trash.index', ['model' => 'bancassurances']) }}" class="navi-link {{ (request()->route('model') == 'bancassurances') ? 'active' : '' }}">
                    <span class="navi-icon mr-4">
                        @include('svg.bancassurance', ['class' => 'svg-icon-lg'])
                    </span>
                    <span class="navi-text font-weight-bold font-size-lg">Ubezpieczenia Bancassurance</span>
                </a>
            </div>
            <div class="navi-item my-2">
                <a href="{{ route('trash.index', ['model' => 'employees']) }}" class="navi-link {{ (request()->route('model') == 'employees') ? 'active' : '' }}">
                    <span class="navi-icon mr-4">
                        @include('svg.employee', ['class' => 'svg-icon-lg'])
                    </span>
                    <span class="navi-text font-weight-bold font-size-lg">Ubezpieczenia Pracownicze</span>
                </a>
            </div>
            <div class="navi-item my-2">
                <a href="{{ route('trash.index', ['model' => 'partners']) }}" class="navi-link {{ (request()->route('model') == 'partners') ? 'active' : '' }}">
                    <span class="navi-icon mr-4">
                        @include('svg.partner', ['class' => 'svg-icon-lg'])
                    </span>
                    <span class="navi-text font-weight-bold font-size-lg">Partnerzy</span>
                </a>
            </div>
            <div class="navi-item my-2">
                <a href="{{ route('trash.index', ['model' => 'risks']) }}" class="navi-link {{ (request()->route('model') == 'risks') ? 'active' : '' }}">
                    <span class="navi-icon mr-4">
                        @include('svg.risk', ['class' => 'svg-icon-lg'])
                    </span>
                    <span class="navi-text font-weight-bold font-size-lg">Ryzyka ubezpieczeniowe</span>
                </a>
            </div>
            <div class="navi-item my-2">
                <a href="{{ route('trash.index', ['model' => 'funds']) }}" class="navi-link {{ (request()->route('model') == 'funds') ? 'active' : '' }}">
                    <span class="navi-icon mr-4">
                        @include('svg.fund', ['class' => 'svg-icon-lg'])
                    </span>
                    <span class="navi-text font-weight-bold font-size-lg">Fundusze UFK</span>
                </a>
            </div>
            <div class="navi-item my-2">
                <a href="{{ route('trash.index', ['model' => 'users']) }}" class="navi-link {{ (request()->route('model') == 'users') ? 'active' : '' }}">
                    <span class="navi-icon mr-4">
                        @include('svg.user', ['class' => 'svg-icon-lg'])
                    </span>
                    <span class="navi-text font-weight-bold font-size-lg">Pracownicy</span>
                </a>
            </div>
            <div class="navi-item my-2">
                <a href="{{ route('trash.index', ['model' => 'departments']) }}" class="navi-link {{ (request()->route('model') == 'departments') ? 'active' : '' }}">
                    <span class="navi-icon mr-4">
                        @include('svg.department', ['class' => 'svg-icon-lg'])
                    </span>
                    <span class="navi-text font-weight-bold font-size-lg">Departamenty</span>
                </a>
            </div>
            <div class="navi-item my-2">
                <a href="{{ route('trash.index', ['model' => 'notes']) }}" class="navi-link {{ (request()->route('model') == 'notes') ? 'active' : '' }}">
                    <span class="navi-icon mr-4">
                        @include('svg.note', ['class' => 'svg-icon-lg'])
                    </span>
                    <span class="navi-text font-weight-bold font-size-lg">Notatki</span>
                </a>
            </div>
            <div class="navi-item my-2">
                <a href="{{ route('trash.index', ['model' => 'file-categories']) }}" class="navi-link {{ (request()->route('model') == 'file-categories') ? 'active' : '' }}">
                    <span class="navi-icon mr-4">
                        @include('svg.file-category', ['class' => 'svg-icon-lg'])
                    </span>
                    <span class="navi-text font-weight-bold font-size-lg">Kategorie dokumentów</span>
                </a>
            </div>
            <div class="navi-item my-2">
                <a href="{{ route('trash.index', ['model' => 'files']) }}" class="navi-link {{ (request()->route('model') == 'files') ? 'active' : '' }}">
                    <span class="navi-icon mr-4">
                        @include('svg.file', ['class' => 'svg-icon-lg'])
                    </span>
                    <span class="navi-text font-weight-bold font-size-lg">Dokumenty</span>
                </a>
            </div>
            <div class="navi-item my-2">
                <a href="{{ route('trash.index', ['model' => 'systems']) }}" class="navi-link {{ (request()->route('model') == 'systems') ? 'active' : '' }}">
                    <span class="navi-icon mr-4">
                        @include('svg.system', ['class' => 'svg-icon-lg'])
                    </span>
                    <span class="navi-text font-weight-bold font-size-lg">Systemy TU</span>
                </a>
            </div>
            <div class="navi-item my-2">
                <a href="{{ route('trash.index', ['model' => 'post-categories']) }}" class="navi-link {{ (request()->route('model') == 'post-categories') ? 'active' : '' }}">
                    <span class="navi-icon mr-4">
                        @include('svg.post-category', ['class' => 'svg-icon-lg'])
                    </span>
                    <span class="navi-text font-weight-bold font-size-lg">Kategorie artykułów</span>
                </a>
            </div>
        </div>
    </div>
</div>