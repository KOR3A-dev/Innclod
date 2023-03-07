<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DOC_DOCUMENTO;
use App\Models\TIP_TIPO_DOC;
use App\Models\PRO_PROCESO;

class DocumentoController extends Controller
{

    public function documentsAll(){
        $documents = DOC_DOCUMENTO::all();
        return response()->json([
            'message' => 'Documento all',
            'documents' => $documents
        ], 200);
    }

    public function createDocument(Request $request)
    {
        $tipo_doc = TIP_TIPO_DOC::find($request->input('DOC_ID_TIPO'));
        $proceso = PRO_PROCESO::find($request->input('DOC_ID_PROCESO'));

        if (!$tipo_doc || !$proceso) {
            return response()->json([
                'message' => 'Tipo de documento o proceso no encontrados'
            ], 404);
        }

        $consecutivo = 1;
        $last_document = DOC_DOCUMENTO::where('DOC_ID_TIPO', $tipo_doc->id)
            ->where('DOC_ID_PROCESO', $proceso->id)
            ->first();

        if ($last_document) {
            $last_consecutivo = intval(substr($last_document->DOC_CODIGO, -3));
            $consecutivo = $last_consecutivo + 1;
        }

        $document = DOC_DOCUMENTO::create(array_merge($request->all(), [
            'DOC_CODIGO' => $tipo_doc->TIP_PREFIJO . '-' . $proceso->PRO_PREFIJO . '-' . sprintf('%01d', $consecutivo),
        ]));

        return response()->json([
            'message' => 'Documento creado exitosamente',
            'data' => $document
        ], 201);
    } 
    
    public function editDocument(Request $request, $id)
    {
        $document = DOC_DOCUMENTO::find($id);
        if (!$document) {
            return response()->json([
                'message' => 'Documento no encontrado'
            ], 404);
        }

        $tipo_doc = TIP_TIPO_DOC::find($request->input('DOC_ID_TIPO'));
        $proceso = PRO_PROCESO::find($request->input('DOC_ID_PROCESO'));

        if (!$tipo_doc || !$proceso) {
            return response()->json([
                'message' => 'Tipo de documento o proceso no encontrados'
            ], 404);
        }

        $consecutivo = intval(substr($document->DOC_CODIGO, -3));

        if ($tipo_doc->id != $document->DOC_ID_TIPO || $proceso->id != $document->DOC_ID_PROCESO) {
           
            // Si el tipo o proceso han cambiado, se debe recalcular el código
            $last_document = DOC_DOCUMENTO::where('DOC_ID_TIPO', $tipo_doc->TIP_PREFIJO)
                ->where('DOC_ID_PROCESO', $proceso->PRO_PREFIJO)
                ->orderBy('DOC_CODIGO', 'desc')
                ->first();
            if ($last_document) {
                $last_consecutivo = intval(substr($last_document->DOC_CODIGO, -3));
                $consecutivo = $last_consecutivo + 1;
            } else {
                $consecutivo = 1;
            }
        }

        $document->DOC_NOMBRE = $request->input('DOC_NOMBRE');
        $document->DOC_CODIGO = $tipo_doc->TIP_PREFIJO . '-' . $proceso->PRO_PREFIJO . '-' . sprintf('%01d', $consecutivo);
        $document->DOC_CONTENIDO = $request->input('DOC_CONTENIDO');
        $document->DOC_ID_TIPO = $tipo_doc->id;
        $document->DOC_ID_PROCESO = $proceso->id;
        $document->save();

        return response()->json([
            'message' => 'Documento actualizado exitosamente',
            'data' => $document
        ], 200);
}

}
