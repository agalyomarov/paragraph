<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <title>{{ env('TITLE_FOR_WEBSITE', 'Paragraph.guru') }}</title>
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        * {
            margin: 0;
            padding: 0;
            border: 0 solid transparent;
        }

        html {
            -webkit-text-size-adjust: 100%;
        }

        body {
            min-height: 100vh;
            line-height: 1;
            text-rendering: optimizeSpeed;
        }

        img,
        svg,
        video,
        canvas,
        audio,
        iframe,
        embed,
        object {
            display: block;
            max-width: 100%;
        }

        input,
        button,
        textarea,
        select {
            font: inherit;
            line-height: inherit;
            color: inherit;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        button,
        [role="button"] {
            cursor: pointer;
            background-color: transparent;
            -webkit-tap-highlight-color: transparent;
        }

        a {
            cursor: pointer;
            color: inherit;
            text-decoration: inherit;
            -webkit-tap-highlight-color: transparent;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-size: inherit;
            font-weight: inherit;
        }

        ol,
        ul {
            list-style: none;
        }

        [type="date"],
        [type="datetime"],
        [type="datetime-local"],
        [type="email"],
        [type="month"],
        [type="number"],
        [type="password"],
        [type="search"],
        [type="tel"],
        [type="text"],
        [type="time"],
        [type="url"],
        [type="week"],
        textarea,
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            width: 100%;
        }

        ::-moz-placeholder {
            opacity: 1;
        }

        textarea {
            vertical-align: top;
            overflow: auto;
        }

        [type="checkbox"],
        [type="radio"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        @media (prefers-reduced-motion: reduce) {
            html:focus-within {
                scroll-behavior: auto;
            }

            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }

        * {
            outline: none;
        }

        .hidden_after:after {
            display: none;
            visibility: hidden;
            z-index: -999;
        }

        .hidden {
            display: none;
            visibility: hidden;
            z-index: -999;
        }

        .wrapper {
            min-height: 100vh;
            width: 100%;
            /* background: yellow; */
        }

        .content {
            float: left;
            width: 732px;
            height: 100%;
            margin-left: calc(50% - 366px);
            padding: 21px 0;
            background: #fff;
        }

        @media (min-width: 1000px) and (max-width: 1200px) {
            .content {
                margin-left: calc(40% - 366px);
            }
        }

        @media (max-width: 999px) {
            .content {
                margin-left: 0;
                width: 100%;
            }

            .sidebar {
                width: 100%;
            }
        }

        .sidebar {
            position: relative;
            width: 96px;
            height: 100vh;
            float: left;
        }

        .content .title {
            width: calc(100% - 42px);
            font-family: 'Roboto', Arial, sans-serif;
            font-weight: 700;
            font-style: normal;
            font-size: 32px;
            margin: 21px 21px 12px 21px;
            line-height: 34px;
        }

        .content .title:after {
            content: "Title";
            font-family: 'Roboto', Arial, sans-serif;
            font-weight: 300;
            font-style: normal;
            font-size: 32px;
            line-height: 34px;
            color: #8F8F8F;
        }

        .content .author {
            font-family: 'Roboto', Arial, sans-serif;
            font-size: 15px;
            line-height: 18px;
            color: #79828B;
            margin: 12px 21px;
            font-style: normal;
            font-weight: 300;
            width: calc(100% - 42px);
        }

        .content .author:after {
            font-family: 'Roboto', Arial, sans-serif;
            content: "Your name";
            font-size: 15px;
            font-weight: 300;
            line-height: 18px;
            color: #79828B;
            font-style: normal;
        }

        .content .story {
            font-family: CustomSerif, Georgia, Cambria, 'Times New Roman', serif;
            font-weight: 300;
            font-style: normal;
            font-size: 18px;
            line-height: 1.58;
            color: rgba(0, 0, 0, .8);
            margin: 12px 21px;
            width: calc(100% - 42px);
            padding-bottom: 100px;
        }

        .content .story:after {
            font-family: CustomSerif, Georgia, Cambria, 'Times New Roman', serif;
            content: "Your story...";
            font-weight: 200;
            font-style: normal;
            font-size: 18px;
            line-height: 1.58;
            color: #79828B;
        }

        .sidebar .author {
            position: absolute;
            top: 50px;
            left: 10px;
            font-family: CustomSansSerif, 'Lucida Grande', Arial, sans-serif;
            font-weight: 300;
            font-size: 15px;
            line-height: 18px;
            color: #000;
            /* margin: 0 0 15px; */
            white-space: pre-wrap;
        }

        .sidebar .btn_publish {
            float: left;
            font-family: CustomSansSerif, 'Lucida Grande', Arial, sans-serif;
            font-weight: 600;
            font-style: normal;
            font-size: 17px;
            color: #000;
            text-decoration: none;
            border: 2px solid #333;
            border-radius: 16px;
            text-transform: uppercase;
            padding: 4px 12px;
            margin: 0px 10px;
            margin-top: 80px;
            background-color: #fff;
            cursor: pointer;
        }

        .sidebar .errors {
            float: left;
            font-family: CustomSansSerif, 'Lucida Grande', Arial, sans-serif;
            font-size: 15px;
            color: rgba(255, 0, 0, .75);
            font-style: normal;
            line-height: 18px;
            margin: 15px 15px;
            transition: opacity .5s ease;
            width: 150px;
        }


        .content .btns {
            width: 100%;
            height: 28px;
        }

        .content .btns .link {
            float: left;
            margin-left: 15px;
        }

        .content .btns .image {
            float: left;
            margin-top: 1px;
        }

        .content .media {
            width: calc(100% - 42px);
            margin-left: 21px;
            height: auto;
            overflow: hidden;
        }

        .content .btns input.select_image {
            width: 1px;
            height: 1px;
            background-color: #fff;
            overflow: hidden;
        }

        .content .media .block_image {
            margin-top: 25px;
            position: relative;
            width: 100%;
            height: auto;
            /* overflow: hidden; */
        }

        .content .media .block_image .img {
            position: relative;
            width: 50%;
            height: auto;
            margin-left: 25%;
        }

        .content .media .block_image img {
            width: 100%;
            height: auto;
        }

        .content .media .block_image span {
            position: absolute;
            width: 25px;
            height: 25px;
            text-align: center;
            color: #79828B;
            border: 2px solid #79828B;
            border-radius: 50%;
            line-height: 23px;
            background-color: #fff;
            right: -10px;
            top: -10px;
            cursor: pointer;
        }

        @media (min-width: 699px) and (max-width: 899px) {
            .content .media .block_image .img {
                width: 60%;
                height: auto;
                margin-left: 20%;
            }
        }

        @media (max-width: 698px) {
            .content .media .block_image .img {
                width: 70%;
                height: auto;
                margin-left: 15%;
            }
        }

        .content .media .block_image .image_content {
            width: 100%;
            font-family: CustomSansSerif, 'Lucida Grande', Arial, sans-serif;
            font-size: 15px;
            color: #79828B;
            padding: 8px 21px;
            line-height: 18px;
            text-align: center;
        }

        .content .media .block_image .image_content:after {
            content: "Caption (optional)";
        }

        .content .media .video_link {
            font-family: CustomSerif, Georgia, Cambria, 'Times New Roman', serif;
            font-weight: 400;
            font-style: normal;
            font-size: 18px;
            line-height: 1.58;
            padding: 0;
            margin: 0;
            color: rgba(0, 0, 0, .8);
            margin: 10px 0;
        }

        .content .media .block_video {
            margin-top: 25px;
            position: relative;
            width: 100%;
            height: auto;
        }

        .content .media .block_video .video {
            position: relative;
            width: 80%;
            height: auto;
            margin-left: 10%;
            background-color: #000;
        }

        .content .media .block_video span {
            position: absolute;
            width: 25px;
            height: 25px;
            text-align: center;
            color: #79828B;
            border: 2px solid #79828B;
            border-radius: 50%;
            line-height: 23px;
            background-color: #fff;
            right: -10px;
            top: -10px;
            cursor: pointer;
        }

        .content .media .block_video .video_content {
            width: 100%;
            font-family: CustomSansSerif, 'Lucida Grande', Arial, sans-serif;
            font-size: 15px;
            color: #79828B;
            padding: 8px 21px;
            line-height: 18px;
            text-align: center;
        }

        .content .media .block_video .video_content:after {
            content: "Caption (optional)";
        }

    </style>
</head>

<body>
    <div class="wrapper">
        <div class="content">
            <div class="title hidden_after" data-url={{ $post->url }}>{{ $post->title }}</div>
            <div class="author {{ $post->author ? 'hidden_after' : '' }}">{{ $post->author }}</div>
            <div class="media" data-status="disabled">
                @foreach ($post->media_materials as $media)
                    @if ($media->mediaType == 'image')
                        <div class="block_media block_image" data-block_media_count="{{ $media->blockCount }}" data-image="url">
                            <div class="img">
                                <img src="{{ $media->mediaValue }}" alt="">
                                <span class="delete_block_image hidden">&#10005;</span>
                            </div>
                            <div class="image_content {{ $media->mediaContent ? 'hidden_after' : '' }}">{{ $media->mediaContent }}</div>
                        </div>
                    @elseif($media->mediaType == 'video')
                        @if ($media->mediaWebSite == 'youtube')
                            <div class="block_media block_video" data-block_media_count="{{ $media->blockCount }}">
                                <div class="video" data-video_website="youtube" data-src="{{ $media->mediaValue }}">
                                    <iframe width="100%" height="300" src="{{ $media->mediaValue }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <span class="delete_block_video hidden">&#10005;</span>
                                </div>
                                <div class="video_content {{ $media->mediaContent ? 'hidden_after' : '' }}">{{ $media->mediaContent }}</div>
                            </div>
                        @elseif($media->mediaWebSite == 'vimeo')
                            <div class="block_media block_video" data-block_media_count="{{ $media->blockCount }}">
                                <div class="video" data-video_website="vimeo" data-src="{{ $media->mediaValue }}">
                                    <iframe src="{{ $media->mediaValue }}" width="100%" height="300" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                                    <span class="delete_block_video hidden">&#10005;</span>
                                </div>
                                <div class="video_content {{ $media->mediaContent ? 'hidden_after' : '' }}">{{ $media->mediaContent }}</div>
                            </div>
                        @elseif($media->mediaWebSite == 'rutube')
                            <div class="block_media block_video" data-block_media_count="{{ $media->blockCount }}">
                                <div class="video" data-video_website="rutube" data-src="{{ $media->mediaValue }}">
                                    <iframe width="100%" height="300" src="{{ $media->mediaValue }}" frameborder="0" allow="clipboard-write" webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe>
                                    <span class="delete_block_video hidden">&#10005;</span>
                                </div>
                                <div class="video_content {{ $media->mediaContent ? 'hidden_after' : '' }}">{{ $media->mediaContent }}</div>
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
            <div class="btns hidden">
                <input type="file" class="select_image">
                <img src="{{ asset('link.png') }}" alt="" class="link">
                <img src="{{ asset('image.png') }}" alt="" class="image">
            </div>
            <div class="story hidden_after">{!! $post->story !!}</div>
        </div>

        <div class="sidebar">
            {{-- <div class="author">Agaly</div> --}}
            @if ($isAuthor)
                <div class="btn_publish" data-status="disabled">Редактировать</div>
            @endif
        </div>
    </div>
    @if ($isAuthor)
        <script>
            document.querySelector('.wrapper .sidebar .btn_publish').addEventListener('click', function(e) {
                if (e.target.dataset.status == 'disabled') {
                    e.target.textContent = 'Опубликовать';
                    e.target.dataset.status = 'enabled';
                    const content = document.querySelector('.wrapper .content');
                    const sidebar = document.querySelector('.wrapper .sidebar');
                    content.querySelector('.media').dataset.status = 'enanled';
                    content.querySelector('.title').setAttribute('contenteditable', 'true');
                    content.querySelector('.author').setAttribute('contenteditable', 'true');
                    content.querySelector('.story').setAttribute('contenteditable', 'true');
                    content.querySelector('.media ').querySelectorAll('span.hidden').forEach(function(element) {
                        if (element.closest('.block_image')) {
                            element.closest('.block_image').querySelector('.image_content').setAttribute('contenteditable', 'true');
                        };
                        if (element.closest('.block_video')) {
                            element.closest('.block_video').querySelector('.video_content').setAttribute('contenteditable', 'true');
                        }
                        element.classList.remove('hidden');
                    });
                    content.querySelector('.btns').classList.remove('hidden');
                } else if (e.target.dataset.status == 'enabled') {
                    let formData = new FormData();
                    const title = document.querySelector('.content .title').textContent;
                    const url = document.querySelector('.content .title').dataset.url;
                    const author = document.querySelector('.content .author').textContent;
                    const story = document.querySelector('.content .story').innerHTML;
                    const mediaMaterials = [];
                    document.querySelectorAll('.content .media .block_media').forEach(function(element) {
                        const media = {};
                        media.blockCount = element.dataset.block_media_count;
                        if (element.classList.contains('block_image')) {
                            media.mediaType = 'image';
                            media.mediaValue = element.querySelector('img').src;
                            media.mediaData = element.dataset.image;
                            media.mediaContent = element.querySelector('.image_content').textContent.trim();
                        } else if (element.classList.contains('block_video')) {
                            media.mediaType = 'video';
                            media.mediaValue = element.querySelector('.video').dataset.src;
                            media.mediaContent = element.querySelector('.video_content').textContent.trim();
                            media.mediaWebSite = element.querySelector('.video').dataset.video_website;
                        }
                        mediaMaterials.push(media);
                    });
                    const body = {};
                    body['title'] = title;
                    body['author'] = author;
                    body['story'] = story.trim();
                    body['mediaMaterials'] = mediaMaterials;
                    fetch(`/${url}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify(body)
                    }).then(res => {
                        return res.json();
                    }).then(data => {
                        if (data.status == 'validate_error') {
                            if (document.querySelector('.wrapper .sidebar .errors')) {
                                document.querySelector('.wrapper .sidebar .errors').remove();
                            }
                            document.querySelector('.wrapper .sidebar').insertAdjacentHTML('beforeend', `<div class="errors">${data.messages[0]}</div>`);
                            setTimeout(() => {
                                document.querySelector('.wrapper .sidebar .errors').style.opacity = 0;
                            }, 2000);
                        } else if (data.status == true) {
                            window.location.reload();
                            // console.log(data);
                        } else {
                            window.location.reload();
                            // window.location = `/${data.message.url}`;
                            // console.log(data);
                        }
                    })
                }
            })
            document.querySelector('.content .title').addEventListener('input', function(e) {
                e.target.classList.remove('hidden_after');
                if (e.target.textContent.length > 0) {
                    e.target.classList.add('hidden_after');
                }
                if (window.getComputedStyle(e.target).height != '34px') {
                    e.target.classList.add('hidden_after');
                }
            });

            document.querySelector('.content .author').addEventListener('input', function(e) {
                e.target.classList.remove('hidden_after');
                if (e.target.textContent.length > 0) {
                    e.target.classList.add('hidden_after');
                }
                if (window.getComputedStyle(e.target).height != '18px') {
                    e.target.classList.add('hidden_after');
                }
            });


            document.querySelector('.content .story').addEventListener('input', function(e) {
                e.target.classList.remove('hidden_after');
                if (e.target.textContent.length > 0) {
                    e.target.classList.add('hidden_after');
                }
                // console.log(parseInt(window.getComputedStyle(e.target).height));
                if (parseInt(window.getComputedStyle(e.target).height) > '129') {
                    e.target.classList.add('hidden_after');
                }
            });


            document.querySelector('.content .btns .image').addEventListener('click', function(e) {
                const selectImage = document.querySelector('.content .btns input.select_image');
                selectImage.click();
                // console.log(e.target);
            });
            document.querySelector('.content .btns input.select_image').addEventListener('change', (event) => {
                if (document.querySelector('.content .media .video_link')) {
                    if (document.querySelector('.content .media .video_link').value.trim().length == 0) {
                        document.querySelector('.content .media .video_link').remove();
                    }
                }
                const blockMedia = document.querySelector('.content .media');
                const blockMediaCount = document.querySelectorAll('.content .media .block_media').length + 1;
                let input = event.target;
                let reader = new FileReader();
                reader.onload = function() {
                    blockMedia.insertAdjacentHTML('beforeend', `
            <div class="block_media block_image" data-block_media_count="${blockMediaCount}" data-image="base64">
                <div class="img">
                    <img src="" alt="">
                    <span class="delete_block_image">&#10005;</span>
                </div>
                <div class="image_content" contenteditable="true">
                </div>
                </div>`);
                    const blocks_images = blockMedia.querySelectorAll('.block_image');
                    blocks_images[blocks_images.length - 1].querySelector('.img img').src = reader.result;
                };
                reader.readAsDataURL(input.files[0]);
            });


            document.querySelector('.content .media').addEventListener('click', function(e) {
                if (e.target.classList.contains('image_content') && this.dataset.status != 'disabled') {
                    e.target.classList.add('hidden_after');
                    e.target.addEventListener('blur', function(event) {
                        if (event.target.textContent.trim().length == 0) {
                            event.target.innerHTML = '';
                            event.target.classList.remove('hidden_after');
                        }
                    })
                }
                if (e.target.classList.contains('video_content') && this.dataset.status != 'disabled') {
                    e.target.classList.add('hidden_after');
                    e.target.addEventListener('blur', function(event) {
                        if (event.target.textContent.trim().length == 0) {
                            event.target.innerHTML = '';
                            event.target.classList.remove('hidden_after');
                        }
                    })
                }
                if (e.target.classList.contains('delete_block_image')) {
                    e.target.closest('.block_image').remove();
                }
                if (e.target.classList.contains('delete_block_video')) {
                    e.target.closest('.block_video').remove();
                }
            })


            document.querySelector('.content .btns .link').addEventListener('click', function(event_event) {
                const media_block = document.querySelector('.content .media');
                if (!document.querySelector('.content .media .video_link')) {
                    media_block.insertAdjacentHTML('beforeend', `<input type="text" class="video_link" placeholder="Paste a YouTube, Vimeo or Rutube link, and press Enter">`);
                    document.querySelector('.content .media .video_link').focus();
                }
                const input_video_link = document.querySelector('.content .media .video_link');
                input_video_link.addEventListener('keypress', function(event) {
                    const blockMediaCount = document.querySelectorAll('.content .media .block_media').length + 1;
                    if (event.key === 'Enter') {
                        if (event.target.value.trim().length == 0) {
                            input_video_link.remove();
                        } else {
                            const link_video = event.target.value.trim();
                            if (link_video.includes('youtube')) {
                                const splits = link_video.split("=");
                                input_video_link.remove();
                                media_block.insertAdjacentHTML('beforeend', `<div class="block_media block_video" data-block_media_count="${blockMediaCount}">
                                              <div class="video" data-video_website="youtube" data-src="https://www.youtube.com/embed/${splits[1]}">
                                                  <iframe width="100%" height="300" src="https://www.youtube.com/embed/${splits[1]}"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                  <span class="delete_block_video">&#10005;</span>
                                              </div>
                                              <div class="video_content" contenteditable="true">
                                              </div>
                                              </div>`);
                            } else if (link_video.includes('vimeo')) {
                                const splits = link_video.split("/");
                                input_video_link.remove();
                                media_block.insertAdjacentHTML('beforeend', `<div class="block_media block_video" data-block_media_count="${blockMediaCount}">
                                              <div class="video" data-video_website="vimeo" data-src="https://player.vimeo.com/video/${splits[splits.length - 1]}">
                                              <iframe src="https://player.vimeo.com/video/${splits[splits.length - 1]}" width="100%" height="300" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                                              <span class="delete_block_video">&#10005;</span>
                                              </div>
                                              <div class="video_content" contenteditable="true">
                                              </div>
                                              </div>`);
                            } else if (link_video.includes('rutube')) {
                                const splits = link_video.split("/");
                                input_video_link.remove();
                                media_block.insertAdjacentHTML('beforeend', `<div class="block_media block_video" data-block_media_count="${blockMediaCount}">
                                              <div class="video" data-video_website="rutube" data-src="https://rutube.ru/pl/?pl_id&pl_type&pl_video=${splits[splits.length - 2]}">
                                              <iframe width="100%" height="300" src="https://rutube.ru/pl/?pl_id&pl_type&pl_video=${splits[splits.length - 2]}" frameborder="0" allow="clipboard-write" webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe>
                                              <span class="delete_block_video">&#10005;</span>
                                             </div>
                                              <div class="video_content" contenteditable="true">
                                              </div>
                                              </div>`);
                                // console.log(splits);
                            }
                        }
                    }
                });
            });
        </script>
    @endif

</body>

</html>
