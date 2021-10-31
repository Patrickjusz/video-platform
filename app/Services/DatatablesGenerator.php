<?php

namespace App\Services;

use Yajra\DataTables\Facades\DataTables;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;

class DatatablesGenerator
{
    public static function getVideos()
    {
        $data = Video::select('*')->where('state', '!=', 'delete')->orderByDesc('created_at');
        $datatables = Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('thumb_html', function ($row) {
                $ret = '<img src="' . url(Storage::url($row->thumb)) . '" width="120">';
                return $ret;
            })
            ->addColumn('description_short', function ($row) {
                // $ret = $row->seo_description ? (substr($row->seo_description, 0, 160) . '...') : '';
                $ret = $row->seo_description;
                return $ret;
            })
            ->addColumn('created_at_format', function ($row) {
                $ret = date_format($row->created_at, 'd-m-Y');
                return $ret;
            })
            ->addColumn('state', function ($row) {
                $ret = $row->state;
                switch ($row->state) {
                    case 'public':
                        $ret = '<span class="badge badge-success">Publiczny</span>';
                        break;
                    case 'not_public':
                        $ret = '<span class="badge badge-warning">Niepubliczny</span>';
                        break;
                    case 'private':
                        $ret = '<span class="badge badge-danger">Prywatny</span>';
                        break;
                }

                return $ret;
            })
            ->addColumn('action', function ($row) {
                $ret = '';
                if ($row->slug) {
                    $ret .= '<button onclick="window.open(\'' . $row->slug . '\',\'_blank\');" class="btn-action btn btn-success btn-sm"><i class="bi bi-eye"></i></button>';
                }
                $ret .=   '<button onclick="window.location.href = \'edit/' . $row->id . '\'" class="btn-action btn btn-primary btn-sm"><i class="bi bi-pencil"></i></button>';
                $ret .= '<button onclick="removeVideo(' . $row->id . ');" class="btn-action btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>';
                return $ret;
            })
            ->rawColumns(['thumb_html', 'action', 'state'])
            ->make(true);

        return $datatables;
    }
}
