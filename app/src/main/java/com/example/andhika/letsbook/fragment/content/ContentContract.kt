package com.example.andhika.letsbook.fragment.content

import com.example.andhika.letsbook.base.BasePresenterInterface
import com.example.andhika.letsbook.base.BaseViewInterface
import com.example.andhika.letsbook.model.EventRequest
import com.example.andhika.letsbook.model.EventResponse

interface ContentContract {


    interface View : BaseViewInterface<Presenter> {
        fun getListEvent(response: EventResponse)
    }

    interface Presenter : BasePresenterInterface<View> {
        fun goToMain(request: EventRequest)
    }
}