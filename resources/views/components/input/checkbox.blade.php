{{-- @props([
//'tempStreet' => false,
// 'unmarkedActivity' => $unmarkedActivity,
])

<i class="text-blue-500 fas fa-2x fa-check-square">

</i> --}}


@props([
'marked' => false,
// 'unmarkedActivity' => $unmarkedActivity,
])

<i @class([ 'text-green-500'=> $marked,
    // 'text-gree-500' => $unmarkedActivity,
    'text-blue-500' => !$marked,
    'fas fa-2x fa-check-square',
    ])>

</i>

