@inject('messaging', 'App\Services\Message\MessageService')

@if($messaging->hasOne())
    <div class="message-container rounded w-auto bg-gray-800 text-gray-300 p-6 mt-8"
         role="alert">
        <strong class="font-bold">{{ $messaging->get()->getType() }}</strong>
        <span class="block sm:inline">{{ $messaging->get()->getContent() }}</span>
        <svg class="ml-auto fill-current text-gray-700 w-6 h-6 cursor-pointer float-right" id="message-close-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
        </svg>
    </div>
@elseif(count($messages))
    <div class="message-container rounded w-auto bg-gray-800 text-gray-300 p-6 mt-8">
        <svg class="ml-auto fill-current text-gray-700 w-6 h-6 cursor-pointer float-right" id="message-close-btn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
        </svg>
        <ul>
            @foreach ($messages as $message)
                <li class="text-xs uppercase">{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif
