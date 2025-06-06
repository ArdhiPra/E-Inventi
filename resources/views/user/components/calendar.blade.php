@php
    use Carbon\Carbon;
    $now = Carbon::now();
    $startOfMonth = $now->copy()->startOfMonth();
    $endOfMonth = $now->copy()->endOfMonth();
    $startDate = $startOfMonth->copy()->startOfWeek(Carbon::MONDAY);
    $endDate = $endOfMonth->copy()->endOfWeek(Carbon::SUNDAY);
@endphp

<table class="w-full table-fixed border-collapse border border-gray-400 text-center">
    <thead>
        <tr class="bg-gray-200">
            @foreach (['SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU', 'MINGGU'] as $day)
                <th class="border border-gray-300 p-2">{{ $day }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @for ($date = $startDate->copy(); $date <= $endDate; $date->addWeek())
            <tr>
                @for ($i = 0; $i < 7; $i++)
                    <td class="border border-gray-300 h-16 align-top">
                        @if ($date->month == $now->month)
                            {{ $date->day }}
                        @else
                            <span class="text-gray-400">{{ $date->day }}</span>
                        @endif
                        @php $date->addDay(); @endphp
                    </td>
                @endfor
            </tr>
        @endfor
    </tbody>
</table>
