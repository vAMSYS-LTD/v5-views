<div class="app-menu">

    @if(!Request::routeIs('phoenix*'))
        @include('components.layouts.partials.logo')
    @endif

    <!--- Menu -->
    <div class="scrollbar" data-simplebar>
        <ul class="menu" data-fc-type="accordion">
            @if(Request::routeIs('phoenix*'))
                <li class="menu-title">Phoenix</li>
                <button id="button-hover-toggle" class="absolute top-5 end-2 rounded-full p-1.5 z-50">
                    <span class="sr-only">Menu Toggle Button</span>
                    <span class="flex items-center justify-center">
                       <i class="fa-regular fa-align-left fa-xl"></i>
                    </span>
                </button>
                <li class="menu-item">
                    <a href="{{ route('phoenix.dashboard') }}" wire:navigate class="menu-link">
                        <span class="menu-icon">
                            <x-icon name="light.house" />
                        </span>
                        <span class="menu-text"> Dashboard </span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('phoenix.profile.pilot', ['airlineIdentifier' => $this->airline->identifier, 'pilotUsername' => $this->pilot->username]) }}"
                       wire:navigate class="menu-link">
                    <span class="menu-icon">
                        <x-icon name="light.user-pilot" />
                    </span>
                        <span class="menu-text"> Your Profile </span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon">
                        <x-icon name="light.globe" />
                    </span>
                        <span class="menu-text"> Flight Centre </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hidden text-gray-500">
                        @if($bookingCount > 0)
                            <li class="menu-item">
                                <a href="{{ route('phoenix.flight-centre.booking') }}" class="menu-link" wire:navigate>
                                    <span class="menu-text">View Booking</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('phoenix.flight-centre.book') }}" class="menu-link" wire:navigate>
                                    <span class="menu-text">Book Additional Flight</span>
                                </a>
                            </li>
                        @else
                            <li class="menu-item">
                                <a href="{{ route('phoenix.flight-centre.book') }}" class="menu-link" wire:navigate>
                                    <span class="menu-text">Book Flight</span>
                                </a>
                            </li>
                        @endif
                        <li class="menu-item">
                            <a href="{{ route('phoenix.flight-centre.map') }}" class="menu-link" wire:navigate>
                                <span class="menu-text">Flight Map</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('phoenix.flight-centre.destinations') }}" class="menu-link" wire:navigate>
                                <span class="menu-text">Destinations</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="{{ route('phoenix.flight-centre.pireps') }}" class="menu-link" wire:navigate>
                                <span class="menu-text">PIREPs</span>
                            </a>
                        </li>

                        @if($airline->enable_claims_system)
                            <li class="menu-item">
                                <a href="{{ route('phoenix.flight-centre.claims') }}" class="menu-link" wire:navigate>
                                    <span class="menu-text">Claims</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
                @if($airline->enable_notam)
                    <li class="menu-item">
                        <a href="{{ route('phoenix.notams') }}" wire:navigate class="menu-link">
                    <span class="menu-icon">
                        <x-icon name="light.octagon-exclamation" />
                    </span>
                            <span class="menu-text"> NOTAMs </span>
                        </a>
                    </li>
                @endif
                @if($airline->enable_events)
                    <li class="menu-item">
                        <a href="{{ route('phoenix.events') }}" wire:navigate class="menu-link">
                    <span class="menu-icon">
                        <x-icon name="light.calendars" />
                    </span>
                            <span class="menu-text"> Events </span>
                        </a>
                    </li>
                @endif

                <li class="menu-item">
                    <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon">
                        <x-icon name="light.folder-open" />
                    </span>
                        <span class="menu-text"> Documents </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hidden text-gray-500">
                        <li class="menu-item">
                            <a href="{{ route('phoenix.documents.ranks') }}" class="menu-link" wire:navigate>
                                <span class="menu-text">Ranks</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('phoenix.documents.scores') }}" class="menu-link" wire:navigate>
                                <span class="menu-text">Scores</span>
                            </a>
                        </li>

                        @foreach($customDocuments as $document)
                            @if($document->external_url)
                                <li class="menu-item">
                                    <a href="https://{{ $document->url }}" target="_blank" class="menu-link">
                                        <span class="menu-text">{{ $document->title }}</span>
                                    </a>
                                </li>
                            @else
                                <li class="menu-item">
                                    <a href="{{ route('phoenix.documents.custom', ['url' => $document->url]) }}"
                                       class="menu-link" wire:navigate>
                                        <span class="menu-text">{{ $document->title }}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach


                        <li class="menu-item">
                            <a href="{{ route('legal') }}" class="menu-link" target="_blank">
                                <span class="menu-text">vAMSYS Policies</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu-item">
                    <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon">
                        <x-icon name="light.tower-control" />
                    </span>
                        <span class="menu-text"> Resources </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hidden text-gray-500">
                        @if($airline->enable_hangar_public)
                            <li class="menu-item">
                                <a href="https://hangar.to/{{ $airline->identifier }}" target="_blank"
                                   class="menu-link">
                                    <span class="menu-text">{{ $airline->design->hangar_name }}</span>
                                </a>
                            </li>
                        @endif
                        @if($acarsPage)
                            <li class="menu-item">
                                <a href="{{ route('phoenix.pages.custom', ['url' => $acarsPage->url]) }}"
                                   class="menu-link" wire:navigate>
                                    <span class="menu-text">{{ $acarsPage->title }}</span>
                                </a>
                            </li>
                        @endif


                        <li class="menu-item">
                            <a href="{{ route('phoenix.resources.airports') }}" class="menu-link" wire:navigate>
                                <span class="menu-text">Airports</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('phoenix.resources.aircrafts') }}" class="menu-link" wire:navigate>
                                <span class="menu-text">Aircraft</span>
                            </a>
                        </li>

                        @foreach($customResources as $resource)
                            @if($resource->external_url)
                                <li class="menu-item">
                                    <a href="https://{{ $resource->url }}" target="_blank" class="menu-link">
                                        <span class="menu-text">{{ $resource->title }}</span>
                                    </a>
                                </li>
                            @else
                                <li class="menu-item">
                                    <a href="{{ route('phoenix.resources.custom', ['url' => $resource->url]) }}"
                                       class="menu-link" wire:navigate>
                                        <span class="menu-text">{{ $resource->title }}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>

                <li class="menu-item">
                    <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon">
                        <x-icon name="light.users" />
                    </span>
                        <span class="menu-text"> Community </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="sub-menu hidden text-gray-500">
                        @if($airline->enable_leaderboard)
                            <li class="menu-item">
                                <a href="{{ route('phoenix.community.leaderboard') }}" wire:navigate class="menu-link">
                                    <span class="menu-text">Leaderboard</span>
                                </a>
                            </li>
                        @endif
                        @if($airline->enable_badges)
                            <li class="menu-item">
                                <a href="{{ route('phoenix.community.badges') }}" wire:navigate class="menu-link">
                                    <span class="menu-text">{{ $airline->badge_name }}</span>
                                </a>
                            </li>
                        @endif

                        <li class="menu-item">
                            <a href="{{ route('phoenix.community.team') }}" class="menu-link" wire:navigate>
                                <span class="menu-text">Team</span>
                            </a>
                        </li>

                        @foreach($socialIcons as $icon)
                            <li class="menu-item">
                                <a href="{{ $icon['url'] }}" target="_blank" class="menu-link">
                                    <span class="menu-text">{{ $icon['name'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                @if($airline->support_url)
                    <li class="menu-item">
                        <a href="{{ $airline->support_url }}" target="_blank" class="menu-link">
                            <span class="menu-icon">
                                <x-icon name="light.message-medical" />
                            </span>
                            <span class="menu-text"> Pilot Support </span>
                        </a>
                    </li>
                @endif

                @foreach($standalonePages as $standalonePage)
                    @if($standalonePage->external_url)
                        <li class="menu-item">
                            <a href="https://{{ $standalonePage->url }}" target="_blank" class="menu-link">
                                <span class="menu-icon">
                                    <x-icon name="light.{{ $standalonePage->icon }}" />
                                </span>
                                <span class="menu-text"> {{ $standalonePage->title }} </span>
                            </a>
                        </li>
                    @else
                        <li class="menu-item">
                            <a href="{{  route('phoenix.pages.custom', ['url' => $standalonePage->url]) }}"
                               wire:navigate class="menu-link">
                                <span class="menu-icon">
                                     <x-icon name="light.{{ $standalonePage->icon }}" />
                                </span>
                                <span class="menu-text"> {{ $standalonePage->title }} </span>
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
            @if(Request::routeIs('vds*'))
                <li class="menu-title">VDS</li>
                <button id="button-hover-toggle" class="absolute top-5 end-2 rounded-full p-1.5 z-50">
                    <span class="sr-only">Menu Toggle Button</span>
                    <span class="flex items-center justify-center">
                       <i class="fa-regular fa-align-left fa-xl"></i>
                    </span>
                </button>
                <li class="menu-item">
                    <a href="{{ route('vds.dashboard') }}" wire:navigate class="menu-link">
                    <span class="menu-icon">
                        <x-icon name="light.house" />
                    </span>
                        <span class="menu-text"> Dashboard </span>
                    </a>
                </li>
                @if(($airlineStaff->can_manage_aircraft) || $airlineStaff->vamsys_staff )
                    <li class="menu-item">
                        <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                        <span class="menu-icon">
                            <x-icon name="light.plane-tail" />
                        </span>
                            <span class="menu-text"> Aircraft Management </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="sub-menu hidden text-gray-500">
                            <li class="menu-item">
                                <a href="{{ route('vds.aircraft.types') }}" class="menu-link" wire:navigate>
                                    <span class="menu-text">Fleets</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('vds.aircraft') }}" class="menu-link" wire:navigate>
                                    <span class="menu-text">Aircraft</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if(($airlineStaff->can_manage_airports || $airlineStaff->can_manage_scenery || $airlineStaff->can_manage_stands) || $airlineStaff->vamsys_staff )
                    <li class="menu-item">
                        <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                            <span class="menu-icon">
                                <x-icon name="light.tower-control" />
                            </span>
                            <span class="menu-text"> Airport Management </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="sub-menu hidden text-gray-500">
                            @if($airlineStaff->can_manage_airports || $airlineStaff->vamsys_staff)
                                <li class="menu-item">
                                    <a href="{{ route('vds.airports') }}" class="menu-link" wire:navigate>
                                        <span class="menu-text">Airports</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('vds.airports.hubs') }}" class="menu-link" wire:navigate>
                                        <span class="menu-text">Hubs</span>
                                    </a>
                                </li>
                            @endif
                            @if($airlineStaff->can_manage_scenery || $airlineStaff->vamsys_staff)
                                <li class="menu-item">
                                    <a href="{{ route('vds.airports.scenery') }}" class="menu-link" wire:navigate>
                                        <span class="menu-text">Scenery</span>
                                    </a>
                                </li>
                            @endif
                            @if($airlineStaff->can_manage_stands || $airlineStaff->vamsys_staff)
                                <li class="menu-item">
                                    <a href="{{ route('vds.airports.stands.list') }}" class="menu-link" wire:navigate>
                                        <span class="menu-text">Stands</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if(($airlineStaff->can_manage_routes || $airlineStaff->can_manage_all_routes) || $airlineStaff->vamsys_staff )
                    <li class="menu-item">
                        <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                            <span class="menu-icon">
                                <x-icon name="light.route" />
                            </span>
                            <span class="menu-text"> Route Management </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="sub-menu hidden text-gray-500">
                            <li class="menu-item">
                                <a href="{{ route('vds.routes.airports') }}" class="menu-link" wire:navigate>
                                    <span class="menu-text">Airports</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('vds.routes.routes') }}" class="menu-link" wire:navigate>
                                    <span class="menu-text">Routes</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if(($airlineStaff->can_manage_routes || $airlineStaff->can_manage_all_routes) || $airlineStaff->vamsys_staff )
                    <li class="menu-item">
                        <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                        <span class="menu-icon">
                            <x-icon name="light.boxes-stacked" />
                        </span>
                            <span class="menu-text"> Load Management </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="sub-menu hidden text-gray-500">
                            <li class="menu-item">
                                <a href="{{ route('vds.load.loadfactor') }}" class="menu-link" wire:navigate>
                                    <span class="menu-text">Load Factors</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('vds.load.containers') }}" class="menu-link" wire:navigate>
                                    <span class="menu-text">Containers</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            @endif
            @if(Request::routeIs('orwell*'))
                <li class="menu-title">Orwell</li>
                <button id="button-hover-toggle" class="absolute top-5 end-2 rounded-full p-1.5 z-50">
                    <span class="sr-only">Menu Toggle Button</span>
                    <span class="flex items-center justify-center">
                       <i class="fa-regular fa-align-left fa-xl"></i>
                    </span>
                </button>
                <li class="menu-item">
                    <a href="{{ route('orwell.dashboard') }}" wire:navigate class="menu-link">
                    <span class="menu-icon">
                        <x-icon name="light.house" />
                    </span>
                        <span class="menu-text"> Dashboard </span>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon">
                        <x-icon name="light.users" />
                    </span>
                        <span class="menu-text"> Pilots </span>
                        @if($pilotActionCount > 0)
                            <span class="badge bg-danger rounded-full">{{ $pilotActionCount }}</span>
                        @endif
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="sub-menu hidden text-gray-500">
                        <li class="menu-item">
                            <a href="{{ route('orwell.pilots.list') }}" class="menu-link" wire:navigate>
                                <span class="menu-text">List</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('orwell.pilots.bans') }}" class="menu-link" wire:navigate>
                                <span class="menu-text">Removed Pilots / Bans</span>
                            </a>
                        </li>
                        @if($airline->enable_registration_review)
                            <li class="menu-item">
                                <a href="{{ route('orwell.pilots.review') }}" class="menu-link" wire:navigate>
                                    @if($registrationReview > 0)
                                        <span class="badge bg-danger rounded-full">{{ $registrationReview }}</span>
                                    @endif
                                    <span class="menu-text">Registration Review</span>
                                </a>
                            </li>
                        @endif
                        @if($airline->enable_transfers)
                            <li class="menu-item">
                                <a href="{{ route('orwell.pilots.transfer') }}" class="menu-link" wire:navigate>
                                    <span class="menu-text">Transfer Requests</span>
                                    @if($transferReview > 0)
                                        <span class="badge bg-danger rounded-full">{{ $transferReview }}</span>
                                    @endif
                                </a>
                            </li>
                        @endif
                        <li class="menu-item">
                            <a href="{{ route('orwell.pilots.merges') }}" class="menu-link" wire:navigate>
                                <span class="menu-text">Merges</span>
                            </a>
                        </li>
                        @if($airline->activitySettings?->enable_holidays)
                            <li class="menu-item">
                                <a href="{{ route('orwell.pilots.holidays') }}" class="menu-link" wire:navigate>
                                    <span class="menu-text">Holidays</span>
                                </a>
                            </li>
                        @endif
                        @if($airline->support_email && $airline->register_slug)
                            <li class="menu-item">
                                <a href="{{ route('orwell.pilots.invites') }}" class="menu-link" wire:navigate>
                                    <span class="menu-text">Invites</span>
                                </a>
                            </li>
                        @endif
                        @if($airline->activitySettings)
                            @if($airline->activitySettings->enable_activity || $airline->activitySettings->enable_initial_activity)
                                <li class="menu-item">
                                    <a href="{{ route('orwell.pilots.activity-whitelist') }}" class="menu-link"
                                       wire:navigate>
                                        <span class="menu-text">Activity Whitelist</span>
                                    </a>
                                </li>
                            @endif
                            @if($airline->activitySettings->enable_initial_activity)
                                <li class="menu-item">
                                    <a href="{{ route('orwell.pilots.initial-activity') }}" class="menu-link"
                                       wire:navigate>
                                        <span class="menu-text">Unmet Initial Activity</span>
                                    </a>
                                </li>
                            @endif
                            @if($airline->activitySettings->enable_activity)
                                <li class="menu-item">
                                    <a href="{{ route('orwell.pilots.activity-grace') }}" class="menu-link"
                                       wire:navigate>
                                        <span class="menu-text">Activity Grace</span>
                                    </a>
                                </li>
                            @endif
                            @if($airlineStaff->can_see_online_center || $airlineStaff->vamsys_staff)
                                <li class="menu-item">
                                    <a href="{{ route('orwell.pilots.online') }}" class="menu-link"
                                       wire:navigate>
                                        <span class="menu-text">Online Centre</span>
                                    </a>
                                </li>
                            @endif
                        @endif
                    </ul>
                </li>
                @if(($airlineStaff->can_see_alerts || $airlineStaff->can_see_notams) || $airlineStaff->vamsys_staff)
                    <li class="menu-item">
                        <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                        <span class="menu-icon">
                            <x-icon name="light.megaphone" />
                        </span>
                            <span class="menu-text">Announcements</span>
                            <span class="menu-arrow"></span>
                        </a>

                        <ul class="sub-menu hidden text-gray-500">
                            @if($airlineStaff->can_see_alerts || $airlineStaff->vamsys_staff)
                                <li class="menu-item">
                                    <a href="{{ route('orwell.announcements.alerts') }}" class="menu-link"
                                       wire:navigate>
                                        <span class="menu-text">Alerts</span>
                                    </a>
                                </li>
                            @endif
                            @if($airline->enable_notam && ($airlineStaff->can_see_notams || $airlineStaff->vamsys_staff))
                                <li class="menu-item">
                                    <a href="{{ route('orwell.announcements.notams') }}" class="menu-link"
                                       wire:navigate>
                                        <span class="menu-text">NOTAMs</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if(($airlineStaff->can_see_livery_review || $airlineStaff->can_see_livery_table) || $airlineStaff->can_see_pirep_review || $airlineStaff->can_see_pirep_table || $airlineStaff->vamsys_staff )
                    <li class="menu-item">
                        <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                        <span class="menu-icon">
                            <x-icon name="light.magnifying-glass-location" />
                        </span>
                            <span class="menu-text">Liveries & PIREPs</span>
                            @if($staffActionCount > 0)
                                <span class="badge bg-danger rounded-full">{{ $staffActionCount }}</span>
                            @endif
                            <span class="menu-arrow"></span>
                        </a>

                        <ul class="sub-menu hidden text-gray-500">
                            @if($airlineStaff->can_see_pirep_review || $airlineStaff->vamsys_staff)
                                <li class="menu-item">
                                    <a href="{{ route('orwell.pireps.pilotNotes') }}" class="menu-link" wire:navigate>
                                        <span class="menu-text">Pilot Notes</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('orwell.pireps.comments') }}" class="menu-link" wire:navigate>
                                        <span class="menu-text">PIREP Comments</span>
                                    </a>
                                </li>
                            @endif
                            @if($airlineStaff->can_see_livery_review || $airlineStaff->vamsys_staff)
                                <li class="menu-item">
                                    <a href="{{ route('orwell.pireps.liveryReview') }}" class="menu-link" wire:navigate>
                                        <span class="menu-text">Livery Review</span>
                                        @if($liveryReview > 0)
                                            <span class="badge bg-danger rounded-full">{{ $liveryReview }}</span>
                                        @endif
                                    </a>
                                </li>
                            @endif
                            @if($airlineStaff->can_see_livery_table || $airlineStaff->vamsys_staff)
                                <li class="menu-item">
                                    <a href="{{ route('orwell.pireps.liveryList') }}" class="menu-link" wire:navigate>
                                        <span class="menu-text">Livery List</span>
                                    </a>
                                </li>
                            @endif
                            @if($airlineStaff->can_see_pirep_review || $airlineStaff->vamsys_staff)
                                <li class="menu-item">
                                    <a href="{{ route('orwell.pireps.review') }}" class="menu-link" wire:navigate>
                                        <span class="menu-text">PIREP Review</span>
                                        @if($pirepReview > 0)
                                            <span class="badge bg-danger rounded-full">{{ $pirepReview }}</span>
                                        @endif
                                    </a>
                                </li>
                            @endif
                            @if($airlineStaff->can_see_pirep_table || $airlineStaff->vamsys_staff)
                                <li class="menu-item">
                                    <a href="{{ route('orwell.pireps.list') }}" class="menu-link" wire:navigate>
                                        <span class="menu-text">PIREP List</span>
                                    </a>
                                </li>
                            @endif
                            @if($airline->enable_claims_system && ($airlineStaff->can_see_pirep_review || $airlineStaff->vamsys_staff))
                                <li class="menu-item">
                                    <a href="{{ route('orwell.claims.list') }}" class="menu-link" wire:navigate>
                                        <span class="menu-text">Claims List</span>
                                        @if($claimReview > 0)
                                            <span class="badge bg-danger rounded-full">{{ $claimReview }}</span>
                                        @endif
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if($airline->enable_events && ($airlineStaff->can_see_event_list || $airlineStaff->vamsys_staff))
                    <li class="menu-item">
                        <a href="{{ route('orwell.events') }}" wire:navigate class="menu-link">
                    <span class="menu-icon">
                        <x-icon name="light.calendars" />
                    </span>
                            <span class="menu-text"> Events </span>
                        </a>
                    </li>
                @endif
                @if($airline->enable_badges && ($airlineStaff->can_see_badges || $airlineStaff->vamsys_staff))
                    <li class="menu-item">
                        <a href="{{ route('orwell.badges') }}" wire:navigate class="menu-link">
                    <span class="menu-icon">
                        <x-icon name="light.award-simple" />
                    </span>
                            <span class="menu-text"> {{ $airline->badge_name }} </span>
                        </a>
                    </li>
                @endif
                @if($airlineStaff->can_see_pages || $airlineStaff->vamsys_staff)
                    <li class="menu-item">
                        <a href="{{ route('orwell.pages.list') }}" wire:navigate class="menu-link">
                    <span class="menu-icon">
                        <x-icon name="light.newspaper" />
                    </span>
                            <span class="menu-text"> Pages </span>
                        </a>
                    </li>
                @endif
                @if($airlineStaff->can_see_staff || $airlineStaff->airline_owner || $airlineStaff->vamsys_staff)
                    <li class="menu-item">
                        <a href="{{ route('orwell.manage.staff') }}" wire:navigate class="menu-link">
                    <span class="menu-icon">
                        <x-icon name="light.people-group" />
                    </span>
                            <span class="menu-text"> Staff </span>
                        </a>
                    </li>
                @endif
                @if($airlineStaff->can_see_ranks || $airlineStaff->vamsys_staff)
                    <li class="menu-item">
                        <a href="{{ route('orwell.manage.ranks') }}" wire:navigate class="menu-link">
                    <span class="menu-icon">
                        <x-icon name="light.ranking-star" />
                    </span>
                            <span class="menu-text"> Ranks </span>
                        </a>
                    </li>
                @endif
                @if($airlineStaff->can_see_orwell_settings ||$airlineStaff->vamsys_staff)
                    <li class="menu-item">
                        <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
        <span class="menu-icon">
            <x-icon name="light.sliders" />
        </span>
                            <span class="menu-text">Settings</span>
                            <span class="menu-arrow"></span>
                        </a>

                        <ul class="sub-menu hidden text-gray-500">
                            @if($airlineStaff->can_see_airline_settings || $airlineStaff->vamsys_staff)
                                <li class="menu-item">
                                    <a href="{{ route('orwell.settings.airline') }}" class="menu-link" wire:navigate>
                                        <span class="menu-text">Airline</span>
                                    </a>
                                </li>
                            @endif
                            @if($airlineStaff->can_see_vds || $airlineStaff->vamsys_staff)
                                <li class="menu-item">
                                    <a href="{{ route('orwell.settings.vds') }}" class="menu-link" wire:navigate>
                                        <span class="menu-text">VDS</span>
                                    </a>
                                </li>
                            @endif
                            @if($airlineStaff->can_see_score_settings || $airlineStaff->vamsys_staff)
                                <li class="menu-item">
                                    <a href="{{ route('orwell.settings.pirep-scores') }}" class="menu-link"
                                       wire:navigate>
                                        <span class="menu-text">Scoring Groups</span>
                                    </a>
                                </li>
                            @endif
                            @if($airlineStaff->can_see_score_settings || $airlineStaff->vamsys_staff)
                                <li class="menu-item">
                                    <a href="{{ route('orwell.settings.pirep-reject') }}" class="menu-link"
                                       wire:navigate>
                                        <span class="menu-text">AutoReject</span>
                                    </a>
                                </li>
                            @endif
                            @if($airlineStaff->can_see_acars_settings || $airlineStaff->vamsys_staff)
                                <li class="menu-item">
                                    <a href="{{ route('orwell.settings.acars') }}" class="menu-link" wire:navigate>
                                        <span class="menu-text">ACARS</span>
                                    </a>
                                </li>
                            @endif
                            @if($airlineStaff->can_see_score_settings || $airlineStaff->vamsys_staff)
                                <li class="menu-item">
                                    <a href="{{ route('orwell.settings.pirep-points') }}" class="menu-link"
                                       wire:navigate>
                                        <span class="menu-text">Point Presets</span>
                                    </a>
                                </li>
                            @endif
                            @if($airlineStaff->can_see_score_settings || $airlineStaff->vamsys_staff)
                                <li class="menu-item">
                                    <a href="{{ route('orwell.settings.pirep-comments') }}" class="menu-link"
                                       wire:navigate>
                                        <span class="menu-text">Comment Presets</span>
                                    </a>
                                </li>
                            @endif
                            @if($airlineStaff->can_see_discord_settings || $airlineStaff->vamsys_staff)
                                <li class="menu-item">
                                    <a href="{{ route('orwell.settings.discord') }}" class="menu-link" wire:navigate>
                                        <span class="menu-text">Discord</span>
                                    </a>
                                </li>
                            @endif
                            @if($airlineStaff->can_see_share_agreements || $airlineStaff->vamsys_staff)
                                <li class="menu-item">
                                    <a href="{{ route('orwell.settings.share') }}" class="menu-link" wire:navigate>
                                        <span class="menu-text">Share Agreements</span>
                                    </a>
                                </li>
                            @endif
                            @if($airlineStaff->can_see_api_settings || $airlineStaff->vamsys_staff)
                                <li class="menu-item">
                                    <a href="{{ route('orwell.settings.api') }}" class="menu-link" wire:navigate>
                                        <span class="menu-text">API</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if($airlineStaff->can_see_export || $airlineStaff->can_see_import ||$airlineStaff->vamsys_staff)
                    <li class="menu-item">
                        <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                        <span class="menu-icon">
                            <x-icon name="light.database" />
                        </span>
                            <span class="menu-text">Data</span>
                            <span class="menu-arrow"></span>
                        </a>

                        <ul class="sub-menu hidden text-gray-500">
                            @if($airlineStaff->can_see_export || $airlineStaff->vamsys_staff)
                                <li class="menu-item">
                                    <a href="{{ route('orwell.data.export') }}" class="menu-link" wire:navigate>
                                        <span class="menu-text">Export</span>
                                    </a>
                                </li>
                            @endif
                            @if($airlineStaff->can_see_import || $airlineStaff->vamsys_staff)
                                <li class="menu-item">
                                    <a href="{{ route('orwell.data.import') }}" class="menu-link" wire:navigate>
                                        <span class="menu-text">Import</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>

                @endif
                @if($airlineStaff->can_see_design_settings ||$airlineStaff->vamsys_staff)
                    <li class="menu-item">
                        <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                        <span class="menu-icon">
                            <x-icon name="light.hammer-brush" />
                        </span>
                            <span class="menu-text">Design</span>
                            <span class="menu-arrow"></span>
                        </a>

                        <ul class="sub-menu hidden text-gray-500">
                            <li class="menu-item">
                                <a href="{{ route('orwell.design.logo') }}" class="menu-link" wire:navigate>
                                    <span class="menu-text">Logo</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('orwell.design.style') }}" class="menu-link" wire:navigate>
                                    <span class="menu-text">Style</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('orwell.design.phoenix') }}" class="menu-link" wire:navigate>
                                    <span class="menu-text">Phoenix Dashboard</span>
                                </a>
                            </li>

                            <li class="menu-item">
                                <a href="{{ route('orwell.design.social') }}" class="menu-link" wire:navigate>
                                    <span class="menu-text">Social Icons</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('orwell.design.email') }}" class="menu-link" wire:navigate>
                                    <span class="menu-text">Emails</span>
                                </a>
                            </li>
                            @if($airline->activitySettings->enable_activity || $airline->activitySettings->enable_initial_activity)
                                <li class="menu-item">
                                    <a href="{{ route('orwell.design.activity-email') }}" class="menu-link"
                                       wire:navigate>
                                        <span class="menu-text">Activity Emails</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if($airline->billable && ($airlineStaff->airline_owner || $airlineStaff->vamsys_staff))
                    <li class="menu-item">
                        <a href="{{ route('orwell.billing') }}" wire:navigate class="menu-link">
                    <span class="menu-icon">
                        <x-icon name="light.file-invoice" />
                    </span>
                            <span class="menu-text"> Billing </span>
                        </a>
                    </li>
                @endif
                <li class="menu-item">
                    <a href="{{ route('orwell.support') }}" wire:navigate class="menu-link">
                            <span class="menu-icon">
                                <x-icon name="light.message-medical" />
                            </span>
                        <span class="menu-text"> VA Support </span>
                    </a>
                </li>
            @endif

            @if(Request::routeIs('aeolus*'))
                <li class="menu-title">Aeolus</li>
                <button id="button-hover-toggle" class="absolute top-5 end-2 rounded-full p-1.5 z-50">
                    <span class="sr-only">Menu Toggle Button</span>
                    <span class="flex items-center justify-center">
                   <i class="fa-regular fa-align-left fa-xl"></i>
                </span>
                </button>
                <li class="menu-item">
                    <a href="{{ route('aeolus.dashboard') }}" wire:navigate class="menu-link">
                        <span class="menu-icon">
                            <x-icon name="light.house" />
                        </span>
                        <span class="menu-text"> Dashboard </span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('aeolus.airlines') }}" wire:navigate class="menu-link">
                        <span class="menu-icon">
                            <x-icon name="light.list" />
                        </span>
                        <span class="menu-text"> Airlines </span>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon">
                        <x-icon name="light.users" />
                    </span>
                        <span class="menu-text">Users</span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="sub-menu hidden text-gray-500">
                        <li class="menu-item">
                            <a href="{{ route('aeolus.users') }}" class="menu-link" wire:navigate>
                                <span class="menu-text">All Users</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('aeolus.users.access-log') }}" class="menu-link" wire:navigate>
                                <span class="menu-text">Access Log</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('aeolus.users.platform-bans') }}" class="menu-link" wire:navigate>
                                <span class="menu-text">Platform Bans</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('aeolus.users.airline-bans') }}" class="menu-link" wire:navigate>
                                <span class="menu-text">Airline Bans</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('aeolus.users.airline-ban-request') }}" class="menu-link" wire:navigate>
                                <span class="menu-text">Airline Ban Escalation - {{ $airlineBanReview }}</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('aeolus.users.airline-review') }}" class="menu-link" wire:navigate>
                                <span class="menu-text">Name Review - VA - {{ $airlineNameReview }}</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('aeolus.users.review') }}" class="menu-link" wire:navigate>
                                <span class="menu-text">Name Review - Global</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="{{ route('aeolus.pilots') }}" wire:navigate class="menu-link">
                    <span class="menu-icon">
                        <x-icon name="light.list" />
                    </span>
                        <span class="menu-text"> Pilots </span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('aeolus.datajobs') }}" wire:navigate class="menu-link">
                    <span class="menu-icon">
                        <x-icon name="light.list" />
                    </span>
                        <span class="menu-text"> DataJobs v3</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('aeolus.admin.airac') }}" wire:navigate class="menu-link">
                    <span class="menu-icon">
                        <x-icon name="light.list" />
                    </span>
                        <span class="menu-text"> AIRAC </span>
                    </a>
                </li>
            @endif
            <li class="menu-title">Apps</li>

            @if(Request::routeIs('phoenix*'))
                <li class="menu-item">
                    <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                        <span class="menu-icon">
                            <x-icon name="light.house" />
                        </span>
                        <span class="menu-text">vAMSYS</span>
                        @if($staffActionCount > 0)
                            <span class="badge bg-danger rounded-full">{{ $staffActionCount }}</span>
                        @endif
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="sub-menu hidden text-gray-500">
                        <li class="menu-item">
                            <a href="{{ route('phoenix.dashboard') }}" wire:navigate class="menu-link">
                    <span class="menu-icon">
                        <x-icon name="light.house" />
                    </span>
                                @if($teamvAMSYS && Request::routeIs('aeolus.*'))
                                    <span class="menu-text"> Phoenix - {{ $airline->identifier }} </span>
                                @else
                                    <span class="menu-text"> Phoenix </span>
                                @endif
                            </a>
                        </li>
                        @if(isset($airline) && $airline->enable_hangar && isset($airlineStaff))
                            <li class="menu-item">
                                <a href="https://hangar.to/{{ $airline->identifier }}" target="_blank"
                                   class="menu-link">
                                    <span class="menu-icon">
                                        <x-icon name="light.house" />
                                    </span>
                                    <span class="menu-text"> Hangar </span>
                                </a>
                            </li>
                        @endif
                        @if(!Request::routeIs('orwell.*') && (($airlineStaff && $airlineStaff->can_access_orwell) || $teamvAMSYS))
                            <li class="menu-item">
                                <a href="{{ route('orwell.dashboard') }}" wire:navigate class="menu-link">
                        <span class="menu-icon">
                            <x-icon name="light.house" />
                        </span>
                                    @if($teamvAMSYS && Request::routeIs('aeolus.*'))
                                        <span class="menu-text"> Orwell - {{ $airline->identifier }} </span>
                                    @elseif(($airlineStaff && $airlineStaff->can_access_orwell) || $teamvAMSYS)
                                        <span class="menu-text"> Orwell </span>
                                        @if($staffActionCount > 0)
                                            <span class="badge bg-danger rounded-full">{{ $staffActionCount }}</span>
                                        @endif
                                    @endif
                                </a>
                            </li>
                        @endif
                        @if(!Request::routeIs('vds.*') && (($airlineStaff && $airlineStaff->can_access_vds) || $teamvAMSYS))
                            <li class="menu-item">
                                <a href="{{ route('vds.dashboard') }}" wire:navigate class="menu-link">
                        <span class="menu-icon">
                            <x-icon name="light.house" />
                        </span>
                                    @if($teamvAMSYS && Request::routeIs('aeolus.*'))
                                        <span class="menu-text"> VDS - {{ $airline->identifier }} </span>
                                    @elseif(($airlineStaff && $airlineStaff->can_access_vds) ||$teamvAMSYS)
                                        <span class="menu-text"> VDS </span>
                                    @endif
                                </a>
                            </li>
                        @endif
                        @if(!Request::routeIs('aeolus.*') && $teamvAMSYS)
                            <li class="menu-item">
                                <a href="{{ route('aeolus.dashboard') }}" wire:navigate class="menu-link">
                        <span class="menu-icon">
                            <x-icon name="light.house" />
                        </span>
                                    <span class="menu-text"> Aeolus </span>
                                </a>
                            </li>
                        @endif
                        <li class="menu-item">
                            <a href="https://vamsys.dev" target="_blank" class="menu-link">
                    <span class="menu-icon">
                            <x-icon name="light.folder-open" />
                        </span>
                                <span class="menu-text"> vAMSYS.dev </span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('legal') }}" target="_blank" class="menu-link">
                    <span class="menu-icon">
                            <x-icon name="light.folder-open" />
                        </span>
                                <span class="menu-text"> Legal </span>
                            </a>
                        </li>
                    </ul>
                </li>
            @else
                <li class="menu-item">
                    <a href="{{ route('phoenix.dashboard') }}" wire:navigate class="menu-link">
                    <span class="menu-icon">
                        <x-icon name="light.house" />
                    </span>
                        @if($teamvAMSYS && Request::routeIs('aeolus.*'))
                            <span class="menu-text"> Phoenix - {{ $airline->identifier }} </span>
                        @else
                            <span class="menu-text"> Phoenix </span>
                        @endif
                    </a>
                </li>
                @if(isset($airline->enable_hangar) && isset($airlineStaff))
                    <li class="menu-item">
                        <a href="https://hangar.to/{{ $airline->identifier }}" target="_blank" class="menu-link">
                        <span class="menu-icon">
                            <x-icon name="light.house" />
                        </span>
                            <span class="menu-text"> Hangar </span>
                        </a>
                    </li>
                @endif
                @if(!Request::routeIs('orwell.*') && (($airlineStaff && $airlineStaff->can_access_orwell) || $teamvAMSYS))
                    <li class="menu-item">
                        <a href="{{ route('orwell.dashboard') }}" wire:navigate class="menu-link">
                        <span class="menu-icon">
                            <x-icon name="light.house" />
                        </span>
                            @if($teamvAMSYS && Request::routeIs('aeolus.*'))
                                <span class="menu-text"> Orwell - {{ $airline->identifier }} </span>
                            @elseif(($airlineStaff && $airlineStaff->can_access_orwell) || $teamvAMSYS)
                                <span class="menu-text"> Orwell </span>
                                @if($staffActionCount > 0)
                                    <span class="badge bg-danger rounded-full">{{ $staffActionCount }}</span>
                                @endif
                            @endif
                        </a>
                    </li>
                @endif
                @if(!Request::routeIs('vds.*') && (($airlineStaff && $airlineStaff->can_access_vds) || $teamvAMSYS))
                    <li class="menu-item">
                        <a href="{{ route('vds.dashboard') }}" wire:navigate class="menu-link">
                        <span class="menu-icon">
                            <x-icon name="light.house" />
                        </span>
                            @if($teamvAMSYS && Request::routeIs('aeolus.*'))
                                <span class="menu-text"> VDS - {{ $airline->identifier }} </span>
                            @elseif(($airlineStaff && $airlineStaff->can_access_vds) ||$teamvAMSYS)
                                <span class="menu-text"> VDS </span>
                            @endif
                        </a>
                    </li>
                @endif
                @if(!Request::routeIs('aeolus.*') && $teamvAMSYS)
                    <li class="menu-item">
                        <a href="{{ route('aeolus.dashboard') }}" wire:navigate class="menu-link">
                        <span class="menu-icon">
                            <x-icon name="light.house" />
                        </span>
                            <span class="menu-text"> Aeolus </span>
                        </a>
                    </li>
                @endif
                <li class="menu-item">
                    <a href="https://vamsys.dev" target="_blank" class="menu-link">
                    <span class="menu-icon">
                            <x-icon name="light.folder-open" />
                        </span>
                        <span class="menu-text"> vAMSYS.dev </span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('legal') }}" target="_blank" class="menu-link">
                    <span class="menu-icon">
                            <x-icon name="light.folder-open" />
                        </span>
                        <span class="menu-text"> Legal </span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
<!-- Sidenav Menu End  -->
