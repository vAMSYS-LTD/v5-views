<div>
    <div class="p-0">
        <div class="grid grid-cols-4 gap-2">
            <div>
                <div class="striped-table">
                    <table>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Pilot</th>
                            <th>PIREPs</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pireps as $entry)
                            <tr>
                                <td class="text-center w-2">
                                    @if($loop->iteration == 1)
                                        <i class="fa-duotone fa-medal fa-lg" style="--fa-primary-color: #d4af37; --fa-secondary-color: #000000;"></i>
                                    @elseif($loop->iteration == 2)
                                        <i class="fa-duotone fa-medal fa-lg" style="--fa-primary-color: #c0c0c0; --fa-secondary-color: #000000;"></i>
                                    @elseif($loop->iteration == 3)
                                        <i class="fa-duotone fa-medal fa-lg" style="--fa-primary-color: #cd7f32; --fa-secondary-color: #000000;"></i>
                                    @else
                                        {{ $loop->iteration }}
                                    @endif
                                </td>
                                <td class="text-center cursor-pointer
                                    @if(!$entry->privacy_enable_lists && $airlineStaff) italic @endif"
                                    @unless(!$entry->privacy_enable_lists)
                                        @mouseenter="$popovers('{{ $entry->username }}')" data-trigger="mouseenter"
                                    @endunless
                                >
                                    @if($entry->privacy_enable_lists)
                                        @if($entry->privacy_enable_profile)
                                            <a href="{{ route('phoenix.profile.pilot', ['airlineIdentifier' => $this->airline->identifier, 'pilotUsername' => $entry->username]) }}" target="_blank">{{ $entry->name }}</a>
                                        @else
                                            {{ $entry->name }}
                                        @endif
                                    @elseif($entry->privacy_enable_lists == false && $airlineStaff)
                                        {{ $entry->name }} - Anonymous Entry
                                    @else
                                        Anonymous
                                    @endif
                                </td>
                                <td class="text-center w-6">{{ number_format($entry->result) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <div class="striped-table">
                    <table>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Pilot</th>
                            <th>Hours</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hours as $entry)
                            <tr>
                                <td class="text-center w-2">
                                    @if($loop->iteration == 1)
                                        <i class="fa-duotone fa-medal fa-lg" style="--fa-primary-color: #d4af37; --fa-secondary-color: #000000;"></i>
                                    @elseif($loop->iteration == 2)
                                        <i class="fa-duotone fa-medal fa-lg" style="--fa-primary-color: #c0c0c0; --fa-secondary-color: #000000;"></i>
                                    @elseif($loop->iteration == 3)
                                        <i class="fa-duotone fa-medal fa-lg" style="--fa-primary-color: #cd7f32; --fa-secondary-color: #000000;"></i>
                                    @else
                                        {{ $loop->iteration }}
                                    @endif
                                </td>
                                <td class="text-center cursor-pointer
                                    @if(!$entry->privacy_enable_lists && $airlineStaff) italic @endif"
                                    @unless(!$entry->privacy_enable_lists)
                                        @mouseenter="$popovers('{{ $entry->username }}')" data-trigger="mouseenter"
                                    @endunless
                                >
                                    @if($entry->privacy_enable_lists)
                                        @if($entry->privacy_enable_profile)
                                            <a href="{{ route('phoenix.profile.pilot', ['airlineIdentifier' => $this->airline->identifier, 'pilotUsername' => $entry->username]) }}" target="_blank">{{ $entry->name }}</a>
                                        @else
                                            {{ $entry->name }}
                                        @endif
                                    @elseif($entry->privacy_enable_lists == false && $airlineStaff)
                                        {{ $entry->name }} - Anonymous Entry
                                    @else
                                        Anonymous
                                    @endif
                                </td>
                                <td class="text-center w-6">{{ sprintf('%02d:%02d:%02d', ($entry->result / 3600), ($entry->result / 60 % 60), $entry->result % 60) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <div class="striped-table">
                    <table>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Pilot</th>
                            <th>Points</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($points as $entry)
                            <tr>
                                <td class="text-center w-2">
                                    @if($loop->iteration == 1)
                                        <i class="fa-duotone fa-medal fa-lg" style="--fa-primary-color: #d4af37; --fa-secondary-color: #000000;"></i>
                                    @elseif($loop->iteration == 2)
                                        <i class="fa-duotone fa-medal fa-lg" style="--fa-primary-color: #c0c0c0; --fa-secondary-color: #000000;"></i>
                                    @elseif($loop->iteration == 3)
                                        <i class="fa-duotone fa-medal fa-lg" style="--fa-primary-color: #cd7f32; --fa-secondary-color: #000000;"></i>
                                    @else
                                        {{ $loop->iteration }}
                                    @endif
                                </td>
                                <td class="text-center cursor-pointer
                                    @if(!$entry->privacy_enable_lists && $airlineStaff) italic @endif"
                                    @unless(!$entry->privacy_enable_lists)
                                        @mouseenter="$popovers('{{ $entry->username }}')" data-trigger="mouseenter"
                                    @endunless
                                >
                                    @if($entry->privacy_enable_lists)
                                        @if($entry->privacy_enable_profile)
                                            <a href="{{ route('phoenix.profile.pilot', ['airlineIdentifier' => $this->airline->identifier, 'pilotUsername' => $entry->username]) }}" target="_blank">{{ $entry->name }}</a>
                                        @else
                                            {{ $entry->name }}
                                        @endif
                                    @elseif($entry->privacy_enable_lists == false && $airlineStaff)
                                        {{ $entry->name }} - Anonymous Entry
                                    @else
                                        Anonymous
                                    @endif
                                </td>
                                <td class="text-center w-6">{{ number_format($entry->result) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <div class="striped-table">
                    <table>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Pilot</th>
                            <th>Bonus Points</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bonus as $entry)
                            <tr>
                                <td class="text-center w-2">
                                    @if($loop->iteration == 1)
                                        <i class="fa-duotone fa-medal fa-lg" style="--fa-primary-color: #d4af37; --fa-secondary-color: #000000;"></i>
                                    @elseif($loop->iteration == 2)
                                        <i class="fa-duotone fa-medal fa-lg" style="--fa-primary-color: #c0c0c0; --fa-secondary-color: #000000;"></i>
                                    @elseif($loop->iteration == 3)
                                        <i class="fa-duotone fa-medal fa-lg" style="--fa-primary-color: #cd7f32; --fa-secondary-color: #000000;"></i>
                                    @else
                                        {{ $loop->iteration }}
                                    @endif
                                </td>
                                <td class="text-center cursor-pointer
                                    @if(!$entry->privacy_enable_lists && $airlineStaff) italic @endif"
                                    @unless(!$entry->privacy_enable_lists)
                                        @mouseenter="$popovers('{{ $entry->username }}')" data-trigger="mouseenter"
                                    @endunless
                                >
                                    @if($entry->privacy_enable_lists)
                                        @if($entry->privacy_enable_profile)
                                            <a href="{{ route('phoenix.profile.pilot', ['airlineIdentifier' => $this->airline->identifier, 'pilotUsername' => $entry->username]) }}" target="_blank">{{ $entry->name }}</a>
                                        @else
                                            {{ $entry->name }}
                                        @endif
                                    @elseif($entry->privacy_enable_lists == false && $airlineStaff)
                                        {{ $entry->name }} - Anonymous Entry
                                    @else
                                        Anonymous
                                    @endif
                                </td>
                                <td class="text-center">{{ number_format($entry->result) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-xs">
            Last Update: {{ $generated }}
        </div>
    </div>
</div>
