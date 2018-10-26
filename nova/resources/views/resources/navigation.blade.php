@if (count(Nova::availableResources(request())))
    <h3 class="flex items-center font-normal text-white mb-6 text-base no-underline">
        <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path fill="var(--sidebar-icon)" d="M3 1h4c1.1045695 0 2 .8954305 2 2v4c0 1.1045695-.8954305 2-2 2H3c-1.1045695 0-2-.8954305-2-2V3c0-1.1045695.8954305-2 2-2zm0 2v4h4V3H3zm10-2h4c1.1045695 0 2 .8954305 2 2v4c0 1.1045695-.8954305 2-2 2h-4c-1.1045695 0-2-.8954305-2-2V3c0-1.1045695.8954305-2 2-2zm0 2v4h4V3h-4zM3 11h4c1.1045695 0 2 .8954305 2 2v4c0 1.1045695-.8954305 2-2 2H3c-1.1045695 0-2-.8954305-2-2v-4c0-1.1045695.8954305-2 2-2zm0 2v4h4v-4H3zm10-2h4c1.1045695 0 2 .8954305 2 2v4c0 1.1045695-.8954305 2-2 2h-4c-1.1045695 0-2-.8954305-2-2v-4c0-1.1045695.8954305-2 2-2zm0 2v4h4v-4h-4z"
            />
        </svg>
        <span class="sidebar-label">{{ __('Resources') }}</span>
    </h3>

    @foreach(Nova::groupedResources(request()) as $group => $resources)
        @if (count($resources) > 0)
            @if (count(Nova::groups(request())) > 1)
                <h4 class="flex ml-8 mb-4 text-xs text-white-50% uppercase tracking-wide">
                @if($group == 'Betradar')
                <svg class="w-3 h-3 mr-2" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 497.4 382.3" enable-background="new 0 0 497.4 382.3" xml:space="preserve">
                  <g>
                    <path fill="var(--sidebar-icon)" d="M394.7,150.2v81.9c0,36.7-30.1,67-66.8,67H169.5c-36.7,0-66.8-30.3-66.8-67v-81.9c0-36.7,30.1-67,66.8-67
                      h158.4C364.6,83.2,394.7,113.5,394.7,150.2z"/>
                    <path fill="var(--sidebar-icon)" d="M354.8,0.2H142.6C64.2,0.2-0.3,64.2-0.3,142.6v97.2c0,78.4,64.5,142.4,142.9,142.4h212.3
                      c78.4,0,142.9-64,142.9-142.4v-97.2C497.7,64.2,433.3,0.2,354.8,0.2z M442.7,231.9c0,59.8-48.5,108.3-108.3,108.3H162
                      c-59.8,0-108.3-48.5-108.3-108.3v-80.4c0-59.8,48.5-108.3,108.3-108.3h172.4c59.8,0,108.3,48.5,108.3,108.3V231.9z"/>
                    <path fill="var(--sidebar-icon)" d="M394.7,150.2v81.9c0,36.7-30.1,67-66.8,67H169.5c-36.7,0-66.8-30.3-66.8-67v-81.9c0-36.7,30.1-67,66.8-67
                      h158.4C364.6,83.2,394.7,113.5,394.7,150.2z"/>
                  </g>
                </svg>
                @endif
                <span>{{ $group }}</span>
                </h4>
            @endif

            <ul class="list-reset mb-8">
                @foreach($resources as $resource)
                    @if (! $resource::$displayInNavigation)
                        @continue
                    @endif

                    <li class="leading-tight mb-4 ml-8 text-sm">
                        <router-link :to="{
                            name: 'index',
                            params: {
                                resourceName: '{{ $resource::uriKey() }}'
                            }
                        }" class="text-white text-justify no-underline dim">
                            {{ $resource::label() }}
                        </router-link>
                    </li>
                @endforeach
            </ul>
        @endif
    @endforeach
@endif

