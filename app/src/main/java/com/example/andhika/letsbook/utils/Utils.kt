package com.example.andhika.letsbook.utils

import android.content.Context
import android.content.DialogInterface
import android.support.annotation.ColorRes
import android.support.design.widget.Snackbar
import android.support.v4.content.ContextCompat
import android.support.v7.app.AlertDialog
import android.view.View
import android.widget.Button
import android.widget.TextView
import com.example.andhika.letsbook.R
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


fun Context.showSnackBar(
    view: View, text: String, actionText: Int = android.R.string.ok,
    duration: Int = Snackbar.LENGTH_INDEFINITE,
    textColor: Int = ContextCompat.getColor(this, R.color.Red),
    onActionClick: () -> Unit = {}, dismissEvent: () -> Unit = {}
) {
    val snackbar = Snackbar.make(view, text, duration)
    snackbar.setAction(actionText) {
        onActionClick.invoke()
        snackbar.dismiss()
    }
    snackbar.setActionTextColor(ContextCompat.getColor(this, R.color.Grey))
    snackbar.duration = Costant.Common.SNACKBAR_DURATION
    snackbar.view.setBackgroundColor(ContextCompat.getColor(this, R.color.white))
    snackbar.view.findViewById<TextView>(android.support.design.R.id.snackbar_text).setTextColor(textColor)
    snackbar.show()
    snackbar.addCallback(object : Snackbar.Callback() {
        override fun onDismissed(transientBottomBar: Snackbar?, event: Int) {
            super.onDismissed(transientBottomBar, event)
            dismissEvent.invoke()
        }
    })
}


fun Button.setEnable(boolean: Boolean) {
    with(this) {
        isEnabled = boolean
        when {
            boolean -> {
                this.setTextColor(ContextCompat.getColor(context,R.color.white))
                this.setBackgroundResource(R.drawable.rounded_button)
            }
            else -> {
                this.setBackgroundResource(R.drawable.rounded_button_disable)
            }
        }
    }
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
