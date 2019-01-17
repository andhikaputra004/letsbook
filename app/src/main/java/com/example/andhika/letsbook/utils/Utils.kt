package com.example.andhika.letsbook.utils

import android.content.Context
import android.content.DialogInterface
import android.support.annotation.ColorRes
import android.support.v4.content.ContextCompat
import android.support.v7.app.AlertDialog
import io.reactivex.BackpressureStrategy
import io.reactivex.Observable
import io.reactivex.android.schedulers.AndroidSchedulers
import io.reactivex.disposables.Disposable
import io.reactivex.schedulers.Schedulers
import io.reactivex.functions.Function
import org.joda.time.DateTime
import org.joda.time.format.DateTimeFormat
import java.text.ParseException


fun Context.getColorCompat(@ColorRes colorId: Int) = ContextCompat.getColor(this, colorId)


fun <T> Observable<T>.transform(): Observable<T> {
    return this.observeOn(AndroidSchedulers.mainThread())
        .onErrorResumeNext(Function { Observable.error(it) })
        .subscribeOn(Schedulers.io())
        .unsubscribeOn(Schedulers.io())
        .observeOn(AndroidSchedulers.mainThread())
}

fun <T> Observable<T>.uisubscribe(onNext: (T) -> Unit, onError: (Throwable) -> Unit,
                                  onCompleted: () -> Unit = {}): Disposable {
    return this.transform().toFlowable(BackpressureStrategy.BUFFER)
        .subscribe({
            onNext(it)
        }, {
            onError(it)
        }, {
            onCompleted.invoke()
        })
}


fun String.changeDateFormat(oldPattern: String, newPattern: String): String {
    var res = ""
    try {
        val oldFormat = DateTimeFormat.forPattern(oldPattern)
        val oldDateTime = oldFormat.parseDateTime(this)
        val newFormat = DateTimeFormat.forPattern(newPattern)
        val newDateTime = DateTime.parse(newFormat.print(oldDateTime), newFormat)
        res = newDateTime.toString(newPattern)
    } catch (e: ParseException) {
        e.printStackTrace()
    }
    return res
}

fun Context.buildAlertDialog(title: String, message: String = "", yesButton: String = "", noButton: String = "", positiveAction: (DialogInterface) -> Unit = {}, negativeAction: (DialogInterface) -> Unit = {}): AlertDialog {
    val builder = AlertDialog.Builder(this)
        .setTitle(title)
        .setMessage(message)

    if (yesButton.isNotEmpty()) {
        builder.setPositiveButton(yesButton, { dialog, _ -> positiveAction.invoke(dialog) })
    }

    if (noButton.isNotEmpty()) {
        builder.setNegativeButton(noButton, { dialog, _ -> negativeAction.invoke(dialog) })
    }

    return builder.create()
}
