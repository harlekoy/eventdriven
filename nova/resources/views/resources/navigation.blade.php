@if (count(Nova::availableResources(request())))
    @foreach(Nova::groupedResources(request()) as $group => $resources)
        @if (count($resources) > 0)
            @if (count(Nova::groups(request())) > 1)
                <h3 class="flex items-center font-normal text-white mb-6 text-base no-underline">
                @if($group == 'Betradar')
                <svg class="sidebar-icon" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 497.4 382.3" enable-background="new 0 0 497.4 382.3" xml:space="preserve">
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
                @elseif($group == 'Resources')
                <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill="var(--sidebar-icon)" d="M3 1h4c1.1045695 0 2 .8954305 2 2v4c0 1.1045695-.8954305 2-2 2H3c-1.1045695 0-2-.8954305-2-2V3c0-1.1045695.8954305-2 2-2zm0 2v4h4V3H3zm10-2h4c1.1045695 0 2 .8954305 2 2v4c0 1.1045695-.8954305 2-2 2h-4c-1.1045695 0-2-.8954305-2-2V3c0-1.1045695.8954305-2 2-2zm0 2v4h4V3h-4zM3 11h4c1.1045695 0 2 .8954305 2 2v4c0 1.1045695-.8954305 2-2 2H3c-1.1045695 0-2-.8954305-2-2v-4c0-1.1045695.8954305-2 2-2zm0 2v4h4v-4H3zm10-2h4c1.1045695 0 2 .8954305 2 2v4c0 1.1045695-.8954305 2-2 2h-4c-1.1045695 0-2-.8954305-2-2v-4c0-1.1045695.8954305-2 2-2zm0 2v4h4v-4h-4z"
                    />
                </svg>
                @elseif('API')
                <svg class="sidebar-icon" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <path fill="var(--sidebar-icon)" d="M286.025,60.847c-11.526,0-22.053,4.352-30.025,11.501c-7.972-7.148-18.5-11.501-30.025-11.501H0v390.306h512V60.847
                    H286.025z M240.999,421.152H30.001v-30.049h195.973c8.284,0,15.025,6.74,15.025,15.025V421.152z M240.999,363.689
                    c-4.702-1.669-9.756-2.588-15.025-2.588H30.001V90.848h195.973c8.284,0,15.025,6.74,15.025,15.025V363.689z M481.999,421.152
                    H271.001v-15.025c0-8.284,6.74-15.025,15.025-15.025h195.973V421.152z M481.999,361.101H286.025
                    c-5.268,0-10.322,0.918-15.025,2.588V105.873c0-8.284,6.74-15.025,15.025-15.025h195.973V361.101z"/>
                <polygon fill="var(--sidebar-icon)" points="391.5,276.029 391.5,205.97 331.462,205.97 331.462,235.971 361.499,235.971 361.499,276.029 331.462,276.029
                    331.462,306.03 421.538,306.03 421.538,276.029       "/>
                <rect fill="var(--sidebar-icon)" x="361.487" y="145.917" width="30.021" height="30.001"/>
                <rect fill="var(--sidebar-icon)" x="60.013" y="120.896" width="150.967" height="30.001"/>
                <rect fill="var(--sidebar-icon)" x="60.013" y="180.949" width="150.967" height="30.001"/>
                <rect fill="var(--sidebar-icon)" x="60.013" y="241.001" width="150.967" height="30.001"/>
                <rect fill="var(--sidebar-icon)" x="60.013" y="301.054" width="150.967" height="30.001"/>
                </svg>
                @endif
                <span>{{ $group }}</span>
                </h3>
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

