import { Component, OnInit } from '@angular/core';

import { FormControl, FormGroup, Validators } from '@angular/forms';
import {MatSnackBar} from '@angular/material/snack-bar';
import { DocumentService } from './document.service';


@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {

  document: any
  documents : any
  formEdit : boolean = false 
  viewListDocuments : boolean = false

  constructor(private documentService:DocumentService, private _snackBar: MatSnackBar) { }

  ngOnInit(): void {
    this.getDocumentsAll()
  }

  openSnackBar(message: string, action: string) {
    this._snackBar.open(message, action)
  }

  formDocument = new FormGroup({
    DOC_NOMBRE : new FormControl('', Validators.required),
    DOC_CONTENIDO : new FormControl('', Validators.required),
    DOC_ID_TIPO : new FormControl('', Validators.required),
    DOC_ID_PROCESO : new FormControl('', Validators.required)
  })

  submit() {
    if (this.formDocument.valid) {
      this.documentService.createDocument(this.formDocument.value).subscribe((response : any) =>{
        this.document = response.data
        this.openSnackBar(response['message'], "OK")
      })
    }
  }

  activeFormEdit(){
    this.formEdit = true
  }

  activeViewListDocuments(){
    this.viewListDocuments = true
  }

  submitEdit(){
    this.formDocument.patchValue({
      DOC_NOMBRE: this.document.DOC_NOMBRE,
      DOC_CONTENIDO: this.document.DOC_CONTENIDO,
      DOC_ID_TIPO: this.document.DOC_ID_TIPO,
      DOC_ID_PROCESO: this.document.DOC_ID_PROCESO
    });
  
    if (this.formDocument.valid) {
      this.documentService.updateDocument(this.formDocument.value, this.document.id).subscribe((response : any) =>{
        console.log(response)
        this.openSnackBar(response['message'], "OK")
      })
    }
  }

  getDocumentsAll(){
    this.documentService.documentsAll().subscribe((response : any) =>{
      this.documents = response.documents
      console.log(this.documents)
    })
  }
  
}
