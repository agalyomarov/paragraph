<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600&display=swap" rel="stylesheet">
    <title>Admin</title>
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

        *:focus {
            outline: none;
        }

        .wrapper {
            max-width: 100vw;
            height: 100vh;
            background-color: #E6EEF8;
            /* background-color: red; */
        }

        .sidebar {
            width: 18.7%;
            height: 100vh;
            background-color: #fff;
            float: left;
            box-shadow: 0px 0px 10px rgba(84, 110, 122, 0.25);
        }

        .content {
            width: 78.6%;
            height: 93.5%;
            background-color: #E6EEF8;
            float: left;
            margin: 1.35%;
        }

        .sidebar .logotip {
            float: left;
            width: 100%;
            height: 91.03px;
            margin-top: 29.97px;
        }

        .sidebar .logotip .el_1 {
            display: inline-block;
            width: 100%;
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 600;
            font-size: 30px;
            line-height: 37px;
            text-align: center;
            color: #122330;
        }

        .sidebar .logotip .el_2 {
            display: inline-block;
            width: 100%;
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 600;
            font-size: 20px;
            line-height: 24px;
            text-align: center;
            color: #122330;
        }

        .sidebar .logotip_border {
            width: 100%;
            height: 1px;
            float: left;
            background: linear-gradient(90deg, rgba(18, 35, 48, 0) 0%, #122330 50%, rgba(18, 35, 48, 0) 100%);
        }

        .sidebar .list_post {
            position: relative;
            float: left;
            width: 290px;
            height: 50px;
            left: calc(9.35vw - 145px);
            margin-top: 30px;
            background-color: #8B3FFD;
            border-radius: 10px;
        }

        .sidebar .list_post svg {
            position: absolute;
            top: 18px;
            left: 15px;
            /* transform: rotate(-90deg); */
        }

        .sidebar .list_post .el_2 {
            display: inline-block;
            line-height: 50px;
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 500;
            font-size: 20px;
            text-align: center;
            color: #FFFFFF;
            margin-left: 33px;
        }

        .content .count_post {
            width: 350px;
            height: 91px;
            background: #8B3FFD;
            box-shadow: 0px 0px 10px rgba(84, 110, 122, 0.25);
            border-radius: 10px;
        }

        .content .count_post .el_1 {
            display: inline-block;
            width: 87px;
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 600;
            font-size: 30px;
            line-height: 37px;
            text-align: center;
            color: #FFFFFF;
            margin-top: 15px;
            margin-left: 131px;
        }

        .content .count_post .el_2 {
            display: inline-block;
            width: 138px;
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 600;
            font-size: 20px;
            line-height: 24px;
            text-align: center;
            color: #FFFFFF;
            margin-left: 106px;
        }

        .content .block_input {
            position: relative;
            width: 100%;
            height: 45px;
            background: #FFFFFF;
            box-shadow: 0px 0px 10px rgba(84, 110, 122, 0.25);
            border-radius: 10px;
            margin-top: 15px;
            overflow: hidden;
        }

        .content .block_input svg {
            position: absolute;
            top: 15px;
            left: 20px;
        }

        .content .block_input input {
            background-color: white;
            width: calc(100% - 51px);
            margin-left: 51px;
            height: 45px;
            line-height: 45px;
            border-color: white;
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 500;
            font-size: 12px;
            color: #546E7A;
            border: none !important;
        }

        .content .table_post {
            position: relative;
            margin-top: 15px;
            width: 100%;
            height: calc(100% - 166px);
            background: white;
            border-radius: 10px;
            overflow: hidden;
            background: #FFFFFF;
            box-shadow: 0px 0px 10px rgba(84, 110, 122, 0.25);
        }

        .content .table_post .table_head {
            width: calc(100% - 60px);
            height: 30.5px;
            margin-top: 15px;
            margin-left: 30px;
            /* background-color: red; */
            border-bottom: 2px solid rgba(18, 35, 48, 0.3)
        }

        .content .table_post .table_head .id {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 600;
            font-size: 20px;
            line-height: 24px;
            color: #122330;
            margin-left: 15px;
            width: 24px;
        }

        .content .table_post .table_head .url {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 600;
            font-size: 20px;
            line-height: 24px;
            color: #122330;
            margin-left: 115px;
            width: 80px;
        }

        .content .table_post .table_head .action {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 600;
            font-size: 20px;
            line-height: 24px;
            color: #122330;
            margin-left: 158px;
            width: 104px;
            float: right;
            margin-right: 15px;
        }

        .content .table_post .table_body {
            float: left;
            width: 100%;
            height: calc(100% - 130px);
            overflow: hidden;
            /* background-color: yellow; */
        }

        .content .table_post .table_tr,
        .content .table_post .table_tr_back {
            width: 100%;
            height: 40px;
            background-color: #fff;
        }

        .content .table_post .table_tr_back {
            background: #E6EEF8;
        }

        .content .table_post .table_tr .id,
        .content .table_post .table_tr_back .id {
            display: inline-block;
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 600;
            font-size: 15px;
            line-height: 40px;
            color: #546E7A;
            margin-left: 45px;
            width: 120px;
        }

        .content .table_post .table_tr .url,
        .content .table_post .table_tr_back .url {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 600;
            font-size: 15px;
            line-height: 40px;
            color: #546E7A;
            margin-left: 20px;
        }

        .content .table_post .table_tr .delete,
        .content .table_post .table_tr_back .delete {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 600;
            font-size: 15px;
            line-height: 40px;
            text-align: right;
            color: #A11F1F;
            float: right;
            margin-right: 45px;
            cursor: pointer;
        }

        .footer_control {
            width: 257px;
            position: absolute;
            bottom: 15px;
            left: calc(50% - 126.5px);
            /* background: yellow; */
            height: 40px;
        }

        .footer_control div.el_1 {
            position: relative;
            background: #FFFFFF;
            box-shadow: 0px 0px 10px rgba(84, 110, 122, 0.25);
            border-radius: 10px;
            width: 40px;
            height: 40px;
            float: left;
        }

        .footer_control div.el_1 svg {
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .footer_control div.el_2 {
            position: relative;
            background: #FFFFFF;
            box-shadow: 0px 0px 10px rgba(84, 110, 122, 0.25);
            border-radius: 10px;
            width: 40px;
            height: 40px;
            float: left;
            margin-left: 5px;
        }

        .footer_control div.el_2 svg {
            position: absolute;
            top: 10px;
            left: 13px;
        }

        .footer_control .el_3 {
            float: left;
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 600;
            font-size: 20px;
            color: #122330;
            line-height: 40px;
            /* background-color: red; */
            width: 70px;
            text-align: center;
            margin-left: 9px;
        }

        .footer_control div.el_5 {
            position: relative;
            background: #FFFFFF;
            box-shadow: 0px 0px 10px rgba(84, 110, 122, 0.25);
            border-radius: 10px;
            width: 40px;
            height: 40px;
            float: right;
            /* margin-left: 5px; */
        }

        .footer_control div.el_5 svg {
            position: absolute;
            top: 10px;
            left: 13px;
        }

        .footer_control div.el_4 {
            position: relative;
            background: #FFFFFF;
            box-shadow: 0px 0px 10px rgba(84, 110, 122, 0.25);
            border-radius: 10px;
            width: 40px;
            height: 40px;
            float: right;
            margin-right: 5px;
        }

        .footer_control div.el_4 svg {
            position: absolute;
            top: 10px;
            left: 13px;
        }

    </style>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="logotip">
                <span class="el_1"> Paragraph.GURU </span>
                <span class="el_2"> Панель управления</span>
            </div>
            <div class="logotip_border">
            </div>
            <div class="list_post">
                <span>
                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.271004 13.744C0.104586 13.58 0.0110978 13.3577 0.0110978 13.1258C0.0110978 12.894 0.104586 12.6717 0.271004 12.5077L5.85729 7.00547L0.271004 1.50324C0.18622 1.42259 0.118592 1.32611 0.072069 1.21944C0.0255456 1.11276 0.00105776 0.998033 3.35163e-05 0.881938C-0.000990724 0.765843 0.0214698 0.650712 0.066104 0.543259C0.110738 0.435806 0.176653 0.338183 0.260001 0.256089C0.343349 0.173995 0.442462 0.109072 0.551557 0.0651093C0.660652 0.0211468 0.777543 -0.000975609 0.895411 3.33786e-05C1.01328 0.00104237 1.12976 0.0251627 1.23807 0.0709858C1.34637 0.11681 1.44432 0.183417 1.52621 0.266926L7.74009 6.38731C7.90651 6.55127 8 6.77362 8 7.00547C8 7.23731 7.90651 7.45966 7.74009 7.62362L1.52621 13.744C1.35974 13.9079 1.13399 14 0.898606 14C0.66322 14 0.437472 13.9079 0.271004 13.744Z"
                            fill="white" />
                    </svg>
                </span>
                <span class="el_2">Список статей</span>
            </div>
        </div>
        <div class="content">
            <div class="count_post">
                <span class="el_1">{{ $countPosts }}</span>
                <span class="el_2">Всего статей</span>
            </div>
            <div class="block_input">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.3617 1.73563C11.3455 2.69586 11.9613 3.95631 12.106 5.30612C12.2507 6.65593 11.9156 8.01324 11.1566 9.15101C11.2891 9.25864 11.3995 9.37703 11.5541 9.48465C11.7749 9.65685 12.073 9.8721 12.4484 10.1196C12.8238 10.3779 13.0667 10.5394 13.1771 10.6255C13.6408 10.9591 13.983 11.2389 14.2149 11.465C14.5682 11.8094 14.8773 12.1645 15.1423 12.5412C15.4183 12.9179 15.6281 13.2838 15.7937 13.6605C15.9483 14.0372 16.0256 14.3924 15.9924 14.7368C15.9704 15.0812 15.8379 15.3718 15.595 15.6085C15.3521 15.8453 15.054 15.9745 14.7007 15.996C14.3584 16.0175 13.983 15.9529 13.6076 15.7915C13.2212 15.6408 12.8348 15.4256 12.4594 15.1565C12.073 14.8982 11.7086 14.5969 11.3553 14.2525C11.1235 14.0264 10.8364 13.6928 10.5052 13.2515C10.3948 13.1116 10.2292 12.8748 9.9863 12.5412C9.7434 12.1968 9.54467 11.9277 9.36802 11.7017C9.19137 11.4865 9.04784 11.325 8.88223 11.1636C7.73626 11.7485 6.42868 11.9617 5.14984 11.772C3.87099 11.5823 2.68764 10.9996 1.77203 10.1089C-0.590677 7.79493 -0.590677 4.03881 1.77203 1.73563C2.33579 1.18541 3.00528 0.748914 3.74222 0.451101C4.47917 0.153289 5.2691 0 6.06686 0C6.86461 0 7.65455 0.153289 8.39149 0.451101C9.12843 0.748914 9.79792 1.18541 10.3617 1.73563ZM8.80495 8.5806C9.52622 7.87235 9.93099 6.91485 9.93099 5.91687C9.93099 4.91889 9.52622 3.96139 8.80495 3.25314C8.44648 2.90267 8.02059 2.6246 7.55169 2.43487C7.08278 2.24514 6.58007 2.14748 6.07238 2.14748C5.56468 2.14748 5.06197 2.24514 4.59307 2.43487C4.12416 2.6246 3.69827 2.90267 3.33981 3.25314C2.98028 3.60258 2.69502 4.01773 2.50039 4.47483C2.30575 4.93192 2.20557 5.42196 2.20557 5.91687C2.20557 6.41178 2.30575 6.90182 2.50039 7.35891C2.69502 7.81601 2.98028 8.23117 3.33981 8.5806C3.69827 8.93107 4.12416 9.20914 4.59307 9.39887C5.06197 9.5886 5.56468 9.68626 6.07238 9.68626C6.58007 9.68626 7.08278 9.5886 7.55169 9.39887C8.02059 9.20914 8.44648 8.93107 8.80495 8.5806Z"
                        fill="#546E7A" />
                </svg>
                <input type="text">
            </div>
            <div class="table_post">
                <div class="table_head">
                    <span class="id">ID</span>
                    <span class="url">Ссылка</span>
                    <span class="action">Действие</span>
                </div>
                <div class="table_body">
                    @foreach ($posts as $post)
                        @if ($loop->even)
                            <div class="table_tr">
                                <span class="id">#{{ $post->id }}</span>
                                <a href='{{ env('APP_URL') }}/{{ $post->url }}' class="url">{{ env('APP_URL') }}/{{ $post->url }}</a>
                                <span class="delete" data-post_id="{{ $post->id }}">Удалить</span>
                            </div>
                        @else
                            <div class="table_tr_back">
                                <span class="id">#{{ $post->id }}</span>
                                <a href='{{ env('APP_URL') }}/{{ $post->url }}' class="url">{{ env('APP_URL') }}/{{ $post->url }}</a>
                                <span class="delete" data-post_id="{{ $post->id }}">Удалить</span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="footer_control">
                    <div class="el_1 footer_element">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19.609 17.8638C19.733 17.98 19.8313 18.1179 19.8984 18.2697C19.9655 18.4216 20 18.5843 20 18.7486C20 18.913 19.9655 19.0757 19.8984 19.2275C19.8313 19.3793 19.733 19.5173 19.609 19.6335C19.4851 19.7497 19.3379 19.8419 19.1759 19.9047C19.014 19.9676 18.8404 20 18.6651 20C18.4898 20 18.3162 19.9676 18.1542 19.9047C17.9923 19.8419 17.8451 19.7497 17.7212 19.6335L8.38863 10.8849C8.26447 10.7688 8.16596 10.6308 8.09875 10.479C8.03154 10.3272 7.99694 10.1644 7.99694 10C7.99694 9.83561 8.03154 9.67283 8.09875 9.52099C8.16596 9.36915 8.26447 9.23124 8.38863 9.11514L17.7212 0.366521C17.8451 0.250319 17.9923 0.158143 18.1542 0.0952551C18.3162 0.0323673 18.4898 4.98226e-07 18.6651 4.98226e-07C18.8404 4.98226e-07 19.014 0.0323673 19.1759 0.0952551C19.3379 0.158143 19.4851 0.250319 19.609 0.366521C19.733 0.482722 19.8313 0.620673 19.8984 0.772498C19.9655 0.924322 20 1.08705 20 1.25138C20 1.41572 19.9655 1.57844 19.8984 1.73026C19.8313 1.88209 19.733 2.02004 19.609 2.13624L11.2177 10L19.609 17.8638ZM4.19896e-07 18.7486C4.19896e-07 19.0801 0.140463 19.398 0.390491 19.6324C0.640518 19.8667 0.979629 19.9984 1.33322 19.9984C1.68681 19.9984 2.02592 19.8667 2.27595 19.6324C2.52598 19.398 2.66644 19.0801 2.66644 18.7486L2.66644 1.25138C2.66644 0.919913 2.52598 0.60202 2.27595 0.367636C2.02592 0.133253 1.68681 0.00157858 1.33322 0.00157858C0.979629 0.00157858 0.640518 0.133253 0.390491 0.367636C0.140463 0.60202 4.19896e-07 0.919913 4.19896e-07 1.25138L4.19896e-07 18.7486Z"
                                fill="#122330" />
                        </svg>
                    </div>
                    <div class="el_2 footer_element" data-url={{ $posts->previousPageUrl() }}>
                        <svg width="13" height="20" viewBox="0 0 13 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.6121 17.8638C11.736 17.98 11.8344 18.1179 11.9014 18.2697C11.9685 18.4216 12.0031 18.5843 12.0031 18.7486C12.0031 18.913 11.9685 19.0757 11.9014 19.2275C11.8344 19.3793 11.736 19.5173 11.6121 19.6335C11.4881 19.7497 11.341 19.8419 11.179 19.9047C11.017 19.9676 10.8434 20 10.6681 20C10.4928 20 10.3193 19.9676 10.1573 19.9047C9.99534 19.8419 9.84818 19.7497 9.72423 19.6335L0.391679 10.8849C0.267521 10.7688 0.169013 10.6308 0.101802 10.479C0.0345903 10.3272 -3.8147e-06 10.1644 -3.8147e-06 10C-3.8147e-06 9.83561 0.0345903 9.67283 0.101802 9.52099C0.169013 9.36915 0.267521 9.23124 0.391679 9.11514L9.72423 0.36652C9.84818 0.250318 9.99534 0.158143 10.1573 0.0952549C10.3193 0.0323671 10.4928 0 10.6681 0C10.8434 0 11.017 0.0323671 11.179 0.0952549C11.341 0.158143 11.4881 0.250318 11.6121 0.36652C11.736 0.482721 11.8344 0.620673 11.9014 0.772497C11.9685 0.924322 12.0031 1.08705 12.0031 1.25138C12.0031 1.41571 11.9685 1.57844 11.9014 1.73026C11.8344 1.88209 11.736 2.02004 11.6121 2.13624L3.22077 10L11.6121 17.8638Z"
                                fill="#122330" />
                        </svg>
                    </div>
                    <div class="el_3 footer_element">
                        {{ $posts->currentPage() }}
                    </div>
                    <div class="el_5 footer_element" data-url={{ $posts->lastPage() }}>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.390984 2.13624C0.267027 2.02004 0.168699 1.88209 0.101614 1.73026C0.0345284 1.57844 1.3061e-09 1.41572 0 1.25138C-1.3061e-09 1.08705 0.0345284 0.924323 0.101614 0.772498C0.168699 0.620674 0.267027 0.482722 0.390984 0.366521C0.514942 0.250319 0.662101 0.158144 0.824059 0.0952558C0.986017 0.032368 1.1596 -1.22438e-09 1.33491 0C1.51021 1.22438e-09 1.68379 0.032368 1.84575 0.0952558C2.00771 0.158144 2.15487 0.250319 2.27883 0.366521L11.6114 9.11514C11.7355 9.23124 11.834 9.36915 11.9013 9.52099C11.9685 9.67283 12.0031 9.83561 12.0031 10C12.0031 10.1644 11.9685 10.3272 11.9013 10.479C11.834 10.6308 11.7355 10.7688 11.6114 10.8849L2.27883 19.6335C2.15487 19.7497 2.00771 19.8419 1.84575 19.9047C1.68379 19.9676 1.51021 20 1.33491 20C1.1596 20 0.986017 19.9676 0.824059 19.9047C0.662101 19.8419 0.514942 19.7497 0.390984 19.6335C0.267027 19.5173 0.168699 19.3793 0.101614 19.2275C0.0345284 19.0757 0 18.913 0 18.7486C0 18.5843 0.0345284 18.4216 0.101614 18.2697C0.168699 18.1179 0.267027 17.98 0.390984 17.8638L8.78228 10L0.390984 2.13624ZM20 1.25138C20 0.919913 19.8595 0.602021 19.6095 0.367638C19.3595 0.133254 19.0204 0.00157868 18.6668 0.00157868C18.3132 0.00157868 17.9741 0.133254 17.724 0.367638C17.474 0.602021 17.3336 0.919913 17.3336 1.25138V18.7486C17.3336 19.0801 17.474 19.398 17.724 19.6324C17.9741 19.8667 18.3132 19.9984 18.6668 19.9984C19.0204 19.9984 19.3595 19.8667 19.6095 19.6324C19.8595 19.398 20 19.0801 20 18.7486V1.25138Z"
                                fill="#122330" />
                        </svg>
                    </div>
                    <div class="el_4 footer_element" data-url="{{ $posts->nextPageUrl() }}">
                        <svg width="13" height="20" viewBox="0 0 13 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.390984 2.13624C0.267027 2.02004 0.168699 1.88209 0.101614 1.73026C0.0345284 1.57844 1.3061e-09 1.41572 0 1.25138C-1.3061e-09 1.08705 0.0345284 0.924323 0.101614 0.772498C0.168699 0.620674 0.267027 0.482722 0.390984 0.366521C0.514942 0.250319 0.662101 0.158144 0.824059 0.0952558C0.986017 0.032368 1.1596 -1.22438e-09 1.33491 0C1.51021 1.22438e-09 1.68379 0.032368 1.84575 0.0952558C2.00771 0.158144 2.15487 0.250319 2.27883 0.366521L11.6114 9.11514C11.7355 9.23124 11.834 9.36915 11.9012 9.52099C11.9685 9.67283 12.0031 9.83561 12.0031 10C12.0031 10.1644 11.9685 10.3272 11.9012 10.479C11.834 10.6308 11.7355 10.7688 11.6114 10.8849L2.27883 19.6335C2.15487 19.7497 2.00771 19.8419 1.84575 19.9047C1.68379 19.9676 1.51021 20 1.33491 20C1.1596 20 0.986017 19.9676 0.824059 19.9047C0.662101 19.8419 0.514942 19.7497 0.390984 19.6335C0.267027 19.5173 0.168699 19.3793 0.101614 19.2275C0.0345284 19.0757 0 18.913 0 18.7486C0 18.5843 0.0345284 18.4216 0.101614 18.2697C0.168699 18.1179 0.267027 17.98 0.390984 17.8638L8.78228 10L0.390984 2.13624Z"
                                fill="#122330" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelector('.table_post').addEventListener('click', function(e) {
            if (e.target.classList.contains('delete')) {
                const check = confirm('Вы хотите удалить статьи?');
                if (check) {
                    const body = {
                        post_id: e.target.dataset.post_id
                    }
                    fetch('admin/', {
                        method: 'delete',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify(body)
                    }).then(res => {
                        return res.json();
                    }).then(data => {
                        window.location.reload();
                    })
                }
            }
        });
        document.querySelector('.footer_control').addEventListener('click', function(e) {
            if (e.target.classList.contains('footer_element') || e.target.closest('.footer_element')) {
                const element = e.target.closest('.footer_element') ? e.target.closest('.footer_element') : e.target;
                let window_location = '';
                if (element.classList.contains('el_4') || element.classList.contains('el_2')) {
                    window_location = element.dataset.url;
                } else if (element.classList.contains('el_5')) {
                    window_location = `/admin?page=${e.target.dataset.url}`;
                } else if (element.classList.contains('el_1')) {
                    window_location = `/admin?page=1`;
                }
                window.location.href = window_location;
            }
        })
    </script>
</body>

</html>
