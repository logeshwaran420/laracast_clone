<div>
                    <h2 class="text-sm text-gray-400 font-bold uppercase mb-2">// Popular Channels</h2>        
                    <ul class="flex flex-wrap gap-2 mt-3">
                        <li>
                            @php
                                $isAllActive = request()->routeIs('thread.channels');
                                $allClasses = $isAllActive
                                    ? 'text-white font-semibold bg-blue-500'
                                    : 'text-blue-400 bg-gray-800 hover:bg-blue-500 hover:text-white transition';
                            @endphp
                        <a href="{{ route('thread.channels') }}"
                               class="text-xs {{ $allClasses }} px-3 py-1 rounded">
                                All
                            </a>
                        </li>
                   @foreach ($categories as $category)
                            @php
                                $isActive = request()->is('discuss/channels/' . $category->name);
                                $classes = $isActive
                                    ? 'text-white bg-blue-500'
                                    : 'text-blue-400 bg-gray-800 hover:bg-blue-500 hover:text-white transition';
                            @endphp
                            <li>
                                <a href="{{ route('thread.channels.view', $category) }}"
                                   class="text-xs {{ $classes }} px-3 py-1 rounded">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>