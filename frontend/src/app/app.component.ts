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

  constructor(private documentService:DocumentService, private _snackBar: MatSnackBar) { }

  ngOnInit(): void {}

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
  
}
