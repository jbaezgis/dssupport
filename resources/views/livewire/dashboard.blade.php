@section('title', __('Dashboard'))
<div>
    <div class="max-w-7xl mx-auto px-2 py-6">
        <div class="flex justify-end">
            <div>{{ __('Today') }}: <strong>{{ $today }}</strong></div>
        </div>
        <div class="">
            <div>
                <div class="grid grid-cols-4 gap-4 py-2 rounded-b mb-2 text-gray-600 text-sm">
                    <div class="shadow rounded p-2">
                        <div>
                            <strong>{{ __('Totay') }}</strong> {{ $bookingsTodayCount }} {{ __('bookings') }}
                        </div>
                        <div class="flex gap-2">
                            <div>
                                {{ __('Pendig') }}: <span class="font-bold">US${{ number_format($bookingsTodaySum, 2, '.', ',') }}</span>
                            </div>
                            <div>
                                |
                            </div>
                            <div class="text-green-600">
                                {{ __('Paid') }}: <span class="font-bold">US${{ number_format($bookingsTodayPaidSum, 2, '.', ',') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="shadow rounded p-2">
                        <div>
                            <strong>{{ __('This week') }}</strong> {{ $bookingsThisWeekCount }} {{ __('bookings') }}
                        </div>
                        <div class="flex gap-2">
                            <div>
                                {{ __('Pendig') }}: <span class="font-bold">US${{ number_format($bookingsThisWeekSum, 2, '.', ',') }}</span>
                            </div>
                            <div>
                                |
                            </div>
                            <div class="text-green-600">
                                {{ __('Paid') }}: <span class="font-bold">US${{ number_format($bookingsThisWeekPaidSum, 2, '.', ',') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="shadow rounded p-2">
                        <div>
                            <strong>{{ __('This month') }}</strong> {{ $bookingsThisMonthCount }} {{ __('bookings') }}
                        </div>
                        <div class="flex gap-2">
                            <div>
                                {{ __('Pendig') }}: <span class="font-bold">US${{ number_format($bookingsThisMonthSum, 2, '.', ',') }}</span>
                            </div>
                            <div>
                                |
                            </div>
                            <div class="text-green-600">
                                {{ __('Paid') }}: <span class="font-bold">US${{ number_format($bookingsThisMonthPaidSum, 2, '.', ',') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="shadow rounded p-2">
                        <div>
                            <strong>{{ __('This year') }}</strong> {{ $bookingsThisYearCount }} {{ __('bookings') }}
                        </div>
                        <div class="flex gap-2">
                            <div>
                                {{ __('Pendig') }}: <span class="font-bold">US${{ number_format($bookingsThisYearSum, 2, '.', ',') }}</span>
                            </div>
                            <div>
                                |
                            </div>
                            <div class="text-green-600">
                                {{ __('Paid') }}: <span class="font-bold">US${{ number_format($bookingsThisYearPaidSum, 2, '.', ',') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div wire:poll class="grid grid-cols-5 gap-4">
                <div class="col-span-3 shadow-lg rounded">
                    <div class="text-lg font-semibold bg-gray-200 p-2 rounded-t">{{ __('Today Bookings') }}</div>
                    <div class="">
                        <table class="border-collapse table-auto w-full text-sm">
                            <thead class="bg-gray-100 text-gray-600">
                              <tr>
                                  <th class="border-b font-medium p-4 pt-0 pb-3 text-gray-400 text-left">#</th>
                                  <th class="border-b font-medium p-4 pb-3 text-left">{{ __('Service') }}</th>
                                  <th class="border-b font-medium p-4 pb-3 text-left">{{ __('Order total') }}</th>
                                  <th class="border-b font-medium p-4 pb-3 text-left">{{ __('Status') }}</th>
                                  <th class="border-b font-medium p-4 pb-3 text-left"></th>
                              </tr>
                            </thead>
                              <tbody class="bg-white">
                                  @foreach ($bookings as $item)
                                      <tr>
                                          <td class="border-b border-gray-100 p-4 text-gray-500">{{ $item->id }}</td>
                                          <td class="border-b border-gray-100 p-4 text-gray-900">
                                              <div>
                                                <div>
                                                    {{ __('From') }}: <strong>{{ $item->alias_location_from }}</strong>
                                                </div>
                                                <div>
                                                    {{ __('To') }}: <strong>{{ $item->alias_location_to }}</strong>
                                                </div>
                                              </div>
                                              <div class="text-xs">
                                                  {{ $item->descripcion }}
                                              </div>
                                          </td>
                                          <td class="border-b border-gray-100 p-4 text-gray-500">${{ number_format($item->order_total, 2, '.', ',') }}</td>
                                          <td class="border-b border-gray-100 p-4 text-gray-500">
                                                @if ($item->status == 'paid')
                                                    <div class="cursor-pointer font-semibold text-green-600 bg-green-200 rounded px-2 py-1">{{ __('Paid') }}</div>
                                                @else
                                                    <div class="cursor-pointer font-semibold bg-gray-200 rounded px-2 py-1">{{ __('Pending') }}</div>
                                                @endif
                                            </td>
                                          {{-- <td class="border-b border-gray-100 p-4 text-gray-500">{{ $item->user->name }}</td> --}}
                                          <td class="border-b border-gray-100 p-4 text-gray-500">
                                            <a class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-400 active:bg-gray-600 focus:outline-none focus:border-gray-600 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" href="{{ url('booking/'.$item->id) }}">{{ __('Open') }}</a>
                                          </td>
                                      </tr>
                                  @endforeach
                              </tbody>
                          </table>
                    </div>
                </div>
                <div class="shadow-lg rounded col-span-2 p-2">
                    <div class="text-lg font-semibold">{{ __('Booking Analytics') }}</div>

                    {{-- <div class="p-2">
                        <div>
                            <strong>{{ __('Totay') }}</strong> {{ $logsFromAndroid }} {{ __('from Android') }}
                        </div>
                        <div>
                            <strong>{{ __('Totay') }}</strong> {{ $logsFromIphone }} {{ __('from iPhone') }}
                        </div>
                        <div>
                            <strong>{{ __('Totay') }}</strong> {{ $logsFromPC }} {{ __('from PC') }}
                        </div>
                    </div> --}}
                </div>
            </div>

        </div>
    </div>
</div>
