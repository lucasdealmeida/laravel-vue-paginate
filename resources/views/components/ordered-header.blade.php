@if (request('sortBy') != $field)
    <a href="javascript:;"
       v-on:click.prevent="$emit(`change`, `{{ request()->fullUrlWithQuery(['sortBy' => $field, 'direction' => 'asc']) }}`)">
        <i class="fas fa-sort"></i>
        {{ $title }}
    </a>
@elseif (request('direction') == 'asc')
    <a href="javascript:;"
       v-on:click.prevent="$emit(`change`, `{{ request()->fullUrlWithQuery(['sortBy' => $field, 'direction' => 'desc']) }}`)">
        <i class="fas fa-sort-up"></i>
        {{ $title }}
    </a>
@else
    <a href="javascript:;"
       v-on:click.prevent="$emit(`change`, `{{ request()->fullUrlWithQuery(['sortBy' => $field, 'direction' => 'asc']) }}`)">
        <i class="fas fa-sort-down"></i>
        {{ $title }}
    </a>
@endif
