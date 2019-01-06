package com.example.andhika.letsbook.base


interface BasePresenterInterface<T> {
    fun takeView(view: T)
    fun dropView()
}