package com.example.andhika.letsbook.utils

import android.content.Context
import android.support.annotation.ColorRes
import android.support.v4.content.ContextCompat
import io.reactivex.BackpressureStrategy
import io.reactivex.Observable
import io.reactivex.android.schedulers.AndroidSchedulers
import io.reactivex.disposables.Disposable
import io.reactivex.schedulers.Schedulers
import io.reactivex.functions.Function


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