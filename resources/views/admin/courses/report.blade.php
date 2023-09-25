@extends('admin.admin_layouts')
@section('title', 'Admin Dashboard')
@section('content')

    <div id="db-wrapper">
        <!-- navbar vertical -->
        <!-- Sidebar -->

        <!-- Page Header -->
            <!-- Container fluid -->
            <div class="container-fluid p-4">

                        <div class="invoice-box" id="{{ $vid->id }}" >
                            <table cellpadding="0" cellspacing="0">
                                <tr class="top">
                                    <td colspan="2">
                                        <table>
                                            <tr>
                                                <td class="title">
                                                <h3>Amal Tadribe</h3>
                                                </td>

                                                <td>
                                                    Course report :#{{ mt_rand(1000000000, 9999999999) }} <br />
                                                    Created: {{ \Illuminate\Support\Carbon::now() }}<br />
                                                    Course Title : {{ $vid->videoCourseTitle }}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr class="information ">
                                    <td colspan="2">
                                        <table>
                                            <tr  class="heading">
                                                <td>
                                                    Enrolled By
                                                </td>

                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @if(\App\Models\admin\EnrolledCourses::where('video_id' , $vid->id)->count() > 0)
                                    @foreach(\App\Models\admin\EnrolledCourses::where('video_id' , $vid->id)->get() as $en)
                                        <tr class="details">
                                            <td>{{ (\App\Models\User::where('id' , $en->user_id)->first())->first_name}}</td>

                                            <td>{{ (\App\Models\User::where('id' , $en->user_id)->first())->last_name }}</td>
                                        </tr>

                                    @endforeach
                                @else

                                @endif
                                <tr class="heading">
                                    <td>Completed by</td>

                                    <td></td>
                                </tr>

                                @if(\App\Models\admin\Completed::where('video_id' , $vid->id)->count() > 0)
                                    @foreach(\App\Models\admin\Completed::where('video_id' , $vid->id)->get() as $com)
                                        <tr class="details">
                                            <td>{{ (\App\Models\User::where('id' , $com->user_id)->first())->first_name}}</td>

                                            <td>{{ (\App\Models\User::where('id' , $com->user_id)->first())->last_name }}</td>
                                        </tr>

                                    @endforeach
                                @else

                                @endif


                            </table>
                        </div>


            </div>
        </div>
    </div>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;

        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
        .content-template{
            display: none;
        }

    </style>
@endsection()


